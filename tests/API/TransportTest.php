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

use BrianFaust\Tests\Ark\TestCase;

/**
 * @coversNothing
 */
class TransportTest extends TestCase
{
    /** @test */
    public function can_get_list()
    {
        // Act...
        $response = $this->getClient()->api('Transport')->list();

        // Assert...
        $this->assertInstanceOf('Illuminate\Support\Collection', $response);
    }

    /** @test */
    public function can_get_blocks_common()
    {
        // Arrange...
        $ids = [];

        // Act...
        $response = $this->getClient()->api('Transport')->blocksCommon($ids);

        // Assert...
        $this->assertInstanceOf('Illuminate\Support\Collection', $response);
    }

    /** @test */
    public function can_get_blocks()
    {
        // Act...
        $response = $this->getClient()->api('Transport')->blocks();

        // Assert...
        $this->assertInstanceOf('Illuminate\Support\Collection', $response);
    }

    /** @test */
    public function can_get_block()
    {
        // Arrange...
        $id = 'AdVSe37niA3uFUPgCgMUH2tMsHF4LpLoiX';

        // Act...
        $response = $this->getClient()->api('Transport')->block($id);

        // Assert...
        $this->assertInstanceOf('Illuminate\Support\Collection', $response);
    }

    /** @test */
    public function can_add_block()
    {
        // Arrange...
        $block = [];

        // Act...
        $response = $this->getClient()->api('Transport')->createBlock($block);

        // Assert...
        $this->assertInstanceOf('Illuminate\Support\Collection', $response);
    }

    /** @test */
    public function can_get_transactions()
    {
        // Act...
        $response = $this->getClient()->api('Transport')->transactions();

        // Assert...
        $this->assertInstanceOf('Illuminate\Support\Collection', $response);
    }

    /** @test */
    public function can_get_transactions_from_ids()
    {
        // Arrange...
        $ids = [];

        // Act...
        $response = $this->getClient()->api('Transport')->transactionsFromIds($ids);

        // Assert...
        $this->assertInstanceOf('Illuminate\Support\Collection', $response);
    }

    /** @test */
    public function can_add_transactions()
    {
        // Arrange...
        $transactions = [];

        // Act...
        $response = $this->getClient()->api('Transport')->createTransactions($transactions);

        // Assert...
        $this->assertInstanceOf('Illuminate\Support\Collection', $response);
    }

    /** @test */
    public function can_get_height()
    {
        // Act...
        $response = $this->getClient()->api('Transport')->height();

        // Assert...
        $this->assertInstanceOf('Illuminate\Support\Collection', $response);
    }

    /** @test */
    public function can_get_status()
    {
        // Act...
        $response = $this->getClient()->api('Transport')->status();

        // Assert...
        $this->assertInstanceOf('Illuminate\Support\Collection', $response);
    }
}
