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

class Crypto
{
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
}
