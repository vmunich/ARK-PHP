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

class MultiSignatureTest extends TestCase
{
    /** @test */
    public function can_create_signed_multisignature_object()
    {
        // Skip...
        // $this->markTestSkipped('This requires secrets and will only be tested on local machines.');

        // Arrange...
        $secret = env('ARK_TESTING_SECRET');
        $secondSecret = env('ARK_TESTING_SECOND_SECRET');
        $keysgroup = str_random(34);
        $lifetime = rand();
        $min = rand();

        // Act...
        $response = $this->getClient()->builder('MultiSignature')->create($secret, $secondSecret, $keysgroup, $lifetime, $min);

        // Assert...
        $this->assertInstanceOf('stdClass', $response);
    }

    /** @test */
    public function can_create_multisignature_transaction()
    {
        $secret = 'secret';
        $secondSecret = 'second secret';
        $min = 2;
        $lifetime = 255;
        $keysgroup = [
            "03a02b9d5fdd1307c2ee4652ba54d492d1fd11a7d1bb3f3a44c4a05e79f19de933",
            "13a02b9d5fdd1307c2ee4652ba54d492d1fd11a7d1bb3f3a44c4a05e79f19de933",
            "23a02b9d5fdd1307c2ee4652ba54d492d1fd11a7d1bb3f3a44c4a05e79f19de933"
        ];

        $transaction = $this->getClient()->builder('MultiSignature')->create($secret, $secondSecret, join('', $keysgroup), $lifetime, $min);
        $this->assertTrue(Crypto::verify($transaction));
    }
}
