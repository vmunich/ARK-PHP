<?php

declare(strict_types=1);

/*
 * This file is part of ARK PHP.
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
        $address = 'DARiJqhogp2Lu6bxufUFQQMuMyZbxjCydN';

        // Act...
        $response = $this->getClient()->api('Account')->balance($address);

        // Assert...
        $this->assertInstanceOf('Illuminate\Support\Collection', $response);
    }

    /** @test */
    public function can_get_publickey()
    {
        // Arrange...
        $address = 'DARiJqhogp2Lu6bxufUFQQMuMyZbxjCydN';

        // Act...
        $response = $this->getClient()->api('Account')->publicKey($address);

        // Assert...
        $this->assertInstanceOf('Illuminate\Support\Collection', $response);
    }

    /** @test */
    public function can_get_delegates()
    {
        // Arrange...
        $address = 'DARiJqhogp2Lu6bxufUFQQMuMyZbxjCydN';

        // Act...
        $response = $this->getClient()->api('Account')->delegates($address);

        // Assert...
        $this->assertInstanceOf('Illuminate\Support\Collection', $response);
    }

    /** @test */
    public function can_get_delegates_fee()
    {
        // Arrange...
        $address = 'DARiJqhogp2Lu6bxufUFQQMuMyZbxjCydN';

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
        $publicKey = '022cca9529ec97a772156c152a00aad155ee6708243e65c9d211a589cb5d43234d';
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
        $address = 'DARiJqhogp2Lu6bxufUFQQMuMyZbxjCydN';

        // Act...
        $response = $this->getClient()->api('Account')->account($address);

        // Assert...
        $this->assertInstanceOf('Illuminate\Support\Collection', $response);
    }
}
