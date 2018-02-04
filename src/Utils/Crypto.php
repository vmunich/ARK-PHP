<?php

declare(strict_types=1);

/*
 * This file is part of Ark PHP Client.
 *
 * (c) Brian Faust <hello@brianfaust.me>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BrianFaust\Ark\Utils;

use BitWasp\Bitcoin\Network\NetworkInterface;
use BrianFaust\Ark\Builders\Transaction;
use BitWasp\Bitcoin\Address\PayToPubKeyHashAddress;
use BitWasp\Bitcoin\Crypto\EcAdapter\Impl\PhpEcc\Key\PrivateKey;
use BitWasp\Bitcoin\Crypto\Hash;
use BitWasp\Bitcoin\Key\PrivateKeyFactory;
use BitWasp\Bitcoin\Key\PublicKeyFactory;
use BitWasp\Bitcoin\Signature\SignatureFactory;
use BitWasp\Bitcoin\Network\NetworkFactory;
use BitWasp\Buffertools\Buffer;

class Crypto
{

    static $network;

    /**
     * Compute an ARK Address from the given public key.
     *
     * @param string $secret
     * @param int    $version
     *
     * @return string
     */
    public function address(string $publicKey, int $version = 0x17): string
    {
        // Public Key
        $ripemd160 = hash('ripemd160', hex2bin($publicKey), true);

        // Seed
        $seed = pack('C*', $version).$ripemd160;

        // Encode
        return Base58::encodeCheck($seed);
    }

    /**
     * Compute an WIF address from the given secret.
     *
     * @param string $secret
     * @param int    $wif
     *
     * @return string
     */
    public function wif(string $secret, int $wif = 0xaa): string
    {
        // Hash the secret
        $secret = hash('sha256', $secret, true);

        // Seed
        $seed = pack('C*', $wif).$secret.pack('C*', 0x01);

        // Encode
        return Base58::encodeCheck($seed);
    }

    public static function getKeys(string $secret)
    {
        $seed = Crypto::bchexdec((hash('sha256', $secret)));
        return PrivateKeyFactory::fromInt($seed, true);
    }

    public static function getAddress(PrivateKey $privateKey, NetworkInterface $network = null)
    {
        $publicKey = $privateKey->getPublicKey();
        $digest = Hash::ripemd160(new Buffer($publicKey->getBinary()));
        if (!$network)
        {
            $network = NetworkFactory::create('17', '00', '00');
        }
        return (new PayToPubKeyHashAddress($digest))->getAddress($network);
    }

    public static function verify($transaction)
    {
        $publicKey = PublicKeyFactory::fromHex($transaction->senderPublicKey);
        $bytes = Transaction::getBytes($transaction);
        return $publicKey->verify(
            new Buffer(hash('sha256', $bytes, true)),
            SignatureFactory::fromHex($transaction->signature)
        );
    }

    public static function secondVerify($transaction, $secondPublicKeyHex)
    {
        $secondPublicKeys = PublicKeyFactory::fromHex($secondPublicKeyHex);
        $bytes = Transaction::getBytes($transaction, false);
        return $secondPublicKeys->verify(
            new Buffer(hash('sha256', $bytes, true)),
            SignatureFactory::fromHex($transaction->signSignature)
        );
    }

    /**
     * hexdec but for integers that are bigger than the largest PHP integer
     * https://stackoverflow.com/questions/1273484/large-hex-values-with-php-hexdec
     *
     * @param $hex
     * @return int|string
     */
    private static function bchexdec(string $hex)
    {
        $dec = '0';
        $len = strlen($hex);
        for ($i = 1; $i <= $len; $i++) {
            $dec = bcadd($dec, bcmul(strval(hexdec($hex[$i - 1])), bcpow('16', strval($len - $i))));
        }
        return $dec;
    }
}

