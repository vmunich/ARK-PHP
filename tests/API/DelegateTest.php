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

namespace BrianFaust\Tests\Ark\API;

use BrianFaust\Tests\Ark\TestCase;

/**
 * @coversNothing
 */
class DelegateTest extends TestCase
{
    /** @test */
    public function can_count()
    {
        // Act...
        $response = $this->getClient()->api('Delegate')->count();

        // Assert...
        $this->assertInstanceOf('Illuminate\Support\Collection', $response);
    }

    /** @test */
    public function can_search()
    {
        // Arrange...
        $q = 'yin';

        // Act...
        $response = $this->getClient()->api('Delegate')->search($q);

        // Assert...
        $this->assertInstanceOf('Illuminate\Support\Collection', $response);
    }

    /** @test */
    public function can_get_voters()
    {
        // Arrange...
        $publicKey = '032fcfd19f0e095bf46bd3ada87e283720c405249b1be1a70bad1d5f20095a8515';

        // Act...
        $response = $this->getClient()->api('Delegate')->voters($publicKey);

        // Assert...
        $this->assertInstanceOf('Illuminate\Support\Collection', $response);
    }

    /** @test */
    public function can_get_delegate()
    {
        // Act...
        $response = $this->getClient()->api('Delegate')->delegate([
            'publicKey' => '032fcfd19f0e095bf46bd3ada87e283720c405249b1be1a70bad1d5f20095a8515',
        ]);

        // Assert...
        $this->assertInstanceOf('Illuminate\Support\Collection', $response);
    }

    /** @test */
    public function can_get_delegates()
    {
        // Act...
        $response = $this->getClient()->api('Delegate')->delegates();

        // Assert...
        $this->assertInstanceOf('Illuminate\Support\Collection', $response);
    }

    /** @test */
    public function can_get_fee()
    {
        // Act...
        $response = $this->getClient()->api('Delegate')->fee();

        // Assert...
        $this->assertInstanceOf('Illuminate\Support\Collection', $response);
    }

    /** @test */
    public function can_get_forged_by_account()
    {
        // Arrange...
        $generatorPublicKey = '032fcfd19f0e095bf46bd3ada87e283720c405249b1be1a70bad1d5f20095a8515';

        // Act...
        $response = $this->getClient()->api('Delegate')->forgedByAccount($generatorPublicKey);

        // Assert...
        $this->assertInstanceOf('Illuminate\Support\Collection', $response);
    }

    /** @test */
    public function can_add_delegate()
    {
        // Skip...
        $this->markTestSkipped('This requires secrets and will only be tested on local machines.');

        // Arrange...
        $secret = env('ARK_TESTING_SECRET');
        $username = str_random(34);
        $secondSecret = env('ARK_TESTING_SECOND_SECRET');

        // Act...
        $response = $this->getClient()->api('Delegate')->create($secret);

        // Assert...
        $this->assertInstanceOf('Illuminate\Support\Collection', $response);
    }

    /** @test */
    public function can_get_next_forgers()
    {
        // Act...
        $response = $this->getClient()->api('Delegate')->nextForgers();

        // Assert...
        $this->assertInstanceOf('Illuminate\Support\Collection', $response);
    }
}
