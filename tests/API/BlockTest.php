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
class BlockTest extends TestCase
{
    /** @test */
    public function can_get_block()
    {
        // Arrange...
        $id = '579681458494339491';

        // Act...
        $response = $this->getClient()->api('Block')->block($id);

        // Assert...
        $this->assertInstanceOf('Illuminate\Support\Collection', $response);
    }

    /** @test */
    public function can_get_blocks()
    {
        // Act...
        $response = $this->getClient()->api('Block')->blocks();

        // Assert...
        $this->assertInstanceOf('Illuminate\Support\Collection', $response);
    }

    /** @test */
    public function can_get_epoch()
    {
        // Act...
        $response = $this->getClient()->api('Block')->epoch();

        // Assert...
        $this->assertInstanceOf('Illuminate\Support\Collection', $response);
    }

    /** @test */
    public function can_get_height()
    {
        // Act...
        $response = $this->getClient()->api('Block')->height();

        // Assert...
        $this->assertInstanceOf('Illuminate\Support\Collection', $response);
    }

    /** @test */
    public function can_get_nethash()
    {
        // Act...
        $response = $this->getClient()->api('Block')->nethash();

        // Assert...
        $this->assertInstanceOf('Illuminate\Support\Collection', $response);
    }

    /** @test */
    public function can_get_fee()
    {
        // Act...
        $response = $this->getClient()->api('Block')->fee();

        // Assert...
        $this->assertInstanceOf('Illuminate\Support\Collection', $response);
    }

    /** @test */
    public function can_get_fees()
    {
        // Act...
        $response = $this->getClient()->api('Block')->fees();

        // Assert...
        $this->assertInstanceOf('Illuminate\Support\Collection', $response);
    }

    /** @test */
    public function can_get_milestone()
    {
        // Act...
        $response = $this->getClient()->api('Block')->milestone();

        // Assert...
        $this->assertInstanceOf('Illuminate\Support\Collection', $response);
    }

    /** @test */
    public function can_get_reward()
    {
        // Act...
        $response = $this->getClient()->api('Block')->reward();

        // Assert...
        $this->assertInstanceOf('Illuminate\Support\Collection', $response);
    }

    /** @test */
    public function can_get_supply()
    {
        // Act...
        $response = $this->getClient()->api('Block')->supply();

        // Assert...
        $this->assertInstanceOf('Illuminate\Support\Collection', $response);
    }

    /** @test */
    public function can_get_status()
    {
        // Act...
        $response = $this->getClient()->api('Block')->status();

        // Assert...
        $this->assertInstanceOf('Illuminate\Support\Collection', $response);
    }
}
