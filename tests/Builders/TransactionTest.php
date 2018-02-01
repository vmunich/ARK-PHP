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

use BrianFaust\Ark\Utils\Crypto;
use BrianFaust\Tests\Ark\TestCase;

/**
 * @coversNothing
 */
class TransactionTest extends TestCase
{
    /** @test */
    public function can_create_signed_transaction_object()
    {
        // Arrange...
        $amount = 133380000000;
        $recipientId = 'AXoXnFi4z1Z6aFvjEYkDVCtBGW2PaRiM25';
        $vendorField = 'This is a transaction from PHP';
        $secret = 'this is a top secret passphrase';

        // Act...
        $transaction = $this->getClient()->builder('Transaction')->create($recipientId, $amount, $vendorField, $secret);

        // Assert...
        $this->assertInstanceOf('stdClass', $transaction);

        $this->assertTrue(Crypto::verify($transaction));
    }

    /** @test */
    public function second_passphrase_verification()
    {
        $amount = 133380000000;
        $recipientId = 'AXoXnFi4z1Z6aFvjEYkDVCtBGW2PaRiM25';
        $vendorField = 'This is a transaction from PHP';
        $secret = 'this is a top secret passphrase';
        $secondSecret = 'this is a top secret second passphrase';

        $transaction = $this->getClient()->builder('Transaction')->create($recipientId, $amount, $vendorField, $secret, $secondSecret);

        $this->assertInstanceOf('stdClass', $transaction);

        $this->assertTrue(Crypto::verify($transaction));
        $this->assertTrue(Crypto::secondVerify($transaction, Crypto::getKeys($secondSecret)->getPublicKey()->getHex()));
    }
}
