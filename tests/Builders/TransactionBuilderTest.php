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

use BrianFaust\Ark\Builders\TransactionBuilder;
use BrianFaust\Ark\Utils\Crypto;
use BrianFaust\Tests\Ark\TestCase;

/**
 * @coversNothing
 */
class TransactionBuilderTest extends TestCase
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
        $transaction = $this->getClient()->transactionBuilder->createNormal($recipientId, $amount, $vendorField, $secret);

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

        $transaction = $this->getClient()->transactionBuilder->createNormal($recipientId, $amount, $vendorField, $secret, $secondSecret);

        $this->assertInstanceOf('stdClass', $transaction);

        $this->assertTrue(Crypto::verify($transaction));
        $this->assertTrue(Crypto::secondVerify($transaction, Crypto::getKeys($secondSecret)->getPublicKey()->getHex()));
    }

    /** @test */
    public function can_create_add_delegate_transaction()
    {
        $secret = 'this is a top secret passphrase';
        $name = 'polopolo';

        $transaction = $this->getClient()->transactionBuilder->createDelegate($name, $secret);
        $this->assertTrue(Crypto::verify($transaction));
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

        $transaction = $this->getClient()->transactionBuilder->createMultiSignature($secret, $secondSecret, join('', $keysgroup), $lifetime, $min);
        $this->assertInstanceOf('stdClass', $transaction);
        $this->assertTrue(Crypto::verify($transaction));
    }

    /** @test */
    public function creates_valid_second_signature_transaction()
    {
        $firstSecret = 'first passphrase';
        $secondSecret = 'second passphrase';

        $transaction = $this->getClient()->transactionBuilder->createSecondSignature($secondSecret, $firstSecret);

        $this->assertInstanceOf('stdClass', $transaction);

        $this->assertTrue(Crypto::verify($transaction));
        $this->assertNull($transaction->signSignature);
        $this->assertEquals($transaction->asset['signature']['publicKey'], Crypto::getKeys($secondSecret)->getPublicKey()->getHex());
    }

    /** @test */
    public function can_create_vote_transaction()
    {
        $secret = 'this is a top secret passphrase';
        $delegate = '034151a3ec46b5670a682b0a63394f863587d1bc97483b1b6c70eb58e7f0aed192';

        $client = $this->getClient();
        $transaction = $client->transactionBuilder->createVote(['+' . $delegate], $secret,null, $client->network);
        $this->assertInstanceOf('stdClass', $transaction);
        $this->assertTrue(Crypto::verify($transaction));
    }
}
