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

/**
 * @coversNothing
 */
class TransactionTest extends TestCase
{
    /** @test */
    public function can_create_signed_transaction_object()
    {
        // Skip...
        $this->markTestSkipped('This requires secrets and will only be tested on local machines.');

        // Arrange...
        $amount = 1 * 10 ** 8;
        $recipientId = 'AdVSe37niA3uFUPgCgMUH2tMsHF4LpLoiX';
        $vendorField = str_random(10);
        $secret = env('ARK_TESTING_SECRET');

        // Act...
        $response = $this->getClient()->builder('Transaction')->create($recipientId, $amount, $vendorField, $secret);

        // Assert...
        $this->assertInstanceOf('stdClass', $response);
    }
}
