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
class LoaderTest extends TestCase
{
    /** @test */
    public function can_status()
    {
        // Act...
        $response = $this->getClient()->api('Loader')->status();

        // Assert...
        $this->assertInstanceOf('Illuminate\Support\Collection', $response);
    }

    /** @test */
    public function can_sync()
    {
        // Act...
        $response = $this->getClient()->api('Loader')->sync();

        // Assert...
        $this->assertInstanceOf('Illuminate\Support\Collection', $response);
    }

    /** @test */
    public function can_autoconfigure()
    {
        // Act...
        $response = $this->getClient()->api('Loader')->autoconfigure();

        // Assert...
        $this->assertInstanceOf('Illuminate\Support\Collection', $response);
    }
}
