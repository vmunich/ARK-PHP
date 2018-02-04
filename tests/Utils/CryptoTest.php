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

namespace BrianFaust\Tests\Ark\Utils;

use BitWasp\Bitcoin\Network\NetworkInterface;
use BrianFaust\Ark\Utils\Crypto;
use BrianFaust\Tests\Ark\TestCase;

/**
 * @coversNothing
 */
class CryptoTest extends TestCase
{
    /** @test */
    public function can_get_address_from_public_key()
    {
        // Arrange...
        $publicKey = '032fcfd19f0e095bf46bd3ada87e283720c405249b1be1a70bad1d5f20095a8515';
        $address = 'AdVSe37niA3uFUPgCgMUH2tMsHF4LpLoiX';

        // Act...
        $result = (new Crypto())->address($publicKey);

        // Assert...
        $this->assertSame($result, $address);
    }

    /** @test */
    public function can_get_wif_from_secret()
    {
        // Arrange...
        $secret = env('ARK_TESTING_SECRET');
        $wif = env('ARK_TESTING_WIF');

        // Act...
        $result = (new Crypto())->wif($secret);

        // Assert...
        $this->assertSame($result, $wif);
    }

    /** @test */
    public function test_address_generation()
    {
        $secret = 'this is a top secret passphrase';
        $address = Crypto::getAddress(Crypto::getKeys($secret), $this->getClient('17')->network);
        $this->assertSame($address, 'AGeYmgbg2LgGxRW2vNNJvQ88PknEJsYizC');
    }

    /** @test */
    public function test_dark_net_address_generation()
    {
        Crypto::useDarkNet();
        $secret = 'this is a top secret passphrase';
        $address = Crypto::getAddress(Crypto::getKeys($secret), $this->getClient('1e')->network);
        $this->assertSame($address, 'D61mfSggzbvQgTUe6JhYKH2doHaqJ3Dyib');
    }
}
