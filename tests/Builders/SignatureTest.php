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
use BrianFaust\Ark\Builders\Transaction;

class SignatureTest extends TestCase
{
    /** @test */
    public function can_create_signed_signature_object()
    {
        // Skip...
        $this->markTestSkipped('This requires secrets and will only be tested on local machines.');

        // Arrange...
        $secret = env('ARK_TESTING_SECRET');
        $secondSecret = env('ARK_TESTING_SECOND_SECRET');

        // Act...
        $response = $this->getClient()->builder('Signature')->create($secret, $secondSecret);

        // Assert...
        $this->assertInstanceOf('stdClass', $response);
    }

    /** @test */
    public function creates_valid_second_signature_transaction()
    {
        $firstSecret = 'first passphrase';
        $secondSecret = 'second passphrase';

        $transaction = Transaction::createSecondSignature($secondSecret, $firstSecret);
        $this->assertTrue(Crypto::verify($transaction));
        $this->assertNull($transaction->signSignature);
        $this->assertEquals($transaction->asset['signature']['publicKey'], Crypto::getKeys($secondSecret)->getPublicKey()->getHex());
    }
}
