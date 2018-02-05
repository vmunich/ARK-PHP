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

namespace BrianFaust\Tests\Ark\API;

use BrianFaust\Ark\Client;
use BrianFaust\Tests\Ark\TestCase;

/**
 * @coversNothing
 */
class AccountTest extends TestCase
{
    /** @test */
    public function can_get_balance()
    {
        // Arrange...
        $address = 'AdVSe37niA3uFUPgCgMUH2tMsHF4LpLoiX';

        // Act...
        $response = $this->getClient()->api('Account')->balance($address);

        // Assert...
        $this->assertInstanceOf('Illuminate\Support\Collection', $response);
    }

    /** @test */
    public function can_get_publickey()
    {
        // Arrange...
        $address = 'AdVSe37niA3uFUPgCgMUH2tMsHF4LpLoiX';

        // Act...
        $response = $this->getClient()->api('Account')->publicKey($address);

        // Assert...
        $this->assertInstanceOf('Illuminate\Support\Collection', $response);
    }

    /** @test */
    public function can_get_delegates()
    {
        // Arrange...
        $address = 'AdVSe37niA3uFUPgCgMUH2tMsHF4LpLoiX';

        // Act...
        $response = $this->getClient()->api('Account')->delegates($address);

        // Assert...
        $this->assertInstanceOf('Illuminate\Support\Collection', $response);
    }

    /** @test */
    public function can_get_delegates_fee()
    {
        // Arrange...
        $address = 'AdVSe37niA3uFUPgCgMUH2tMsHF4LpLoiX';

        // Act...
        $response = $this->getClient()->api('Account')->delegatesFee($address);

        // Assert...
        $this->assertInstanceOf('Illuminate\Support\Collection', $response);
    }

    /** @test */
    public function can_add_delegates()
    {
        // Skip...
        $this->markTestSkipped('This requires secrets and will only be tested on local machines.');

        // Arrange...
        $secret = str_random(34);
        $publicKey = '032fcfd19f0e095bf46bd3ada87e283720c405249b1be1a70bad1d5f20095a8515';
        $secondSecret = str_random(34);

        // Act...
        $response = $this->getClient()->api('Account')->createDelegates($secret, $publicKey, $secondSecret);

        // Assert...
        $this->assertInstanceOf('Illuminate\Support\Collection', $response);
    }

    /** @test */
    public function can_get_account()
    {
        // Arrange...
        $address = 'AdVSe37niA3uFUPgCgMUH2tMsHF4LpLoiX';

        // Act...
        $response = $this->getClient()->api('Account')->account($address);

        // Assert...
        $this->assertInstanceOf('Illuminate\Support\Collection', $response);
    }
}
