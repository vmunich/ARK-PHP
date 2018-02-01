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

namespace BrianFaust\Tests\Ark\Builders;

use BrianFaust\Tests\Ark\TestCase;
use BrianFaust\Ark\Utils\Crypto;

class DelegateTest extends TestCase
{
    /** @test */
    public function can_create_signed_transaction_object()
    {
        // Skip...
        $this->markTestSkipped('This requires secrets and will only be tested on local machines.');

        // Arrange...
        $secret = env('ARK_TESTING_SECRET');
        $username = str_random(8);
        $secondSecret = env('ARK_TESTING_SECOND_SECRET');

        // Act...
        $response = $this->getClient()->builder('Delegate')->create($secret, $username, $secondSecret);

        // Assert...
        $this->assertInstanceOf('stdClass', $response);
    }

    /** @test */
    public function can_create_add_delegate_transaction()
    {
        $secret = 'this is a top secret passphrase';
        $name = 'polopolo';

        $transaction = $this->getClient()->builder('Delegate')->create($secret, $name);
        $this->assertTrue(Crypto::verify($transaction));
    }
}
