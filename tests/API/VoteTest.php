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

use InvalidArgumentException;
use BrianFaust\Tests\Ark\TestCase;

/**
 * @coversNothing
 */
class VoteTest extends TestCase
{
    /** @test */
    public function can_vote()
    {
        // Skip...
        $this->markTestSkipped('This requires secrets and will only be tested on local machines.');

        // Arrange...
        $secret = env('ARK_TESTING_SECRET');
        $delegate = '032fcfd19f0e095bf46bd3ada87e283720c405249b1be1a70bad1d5f20095a8515';
        $secondSecret = env('ARK_TESTING_SECOND_SECRET');

        // Act...
        $response = $this->getClient()->api('Vote')->vote($secret, $delegate, $secondSecret);

        // Assert...
        $this->assertInstanceOf('Illuminate\Support\Collection', $response);
    }

    /** @test */
    public function can_unvote()
    {
        // Skip...
        $this->markTestSkipped('This requires secrets and will only be tested on local machines.');

        // Arrange...
        $secret = env('ARK_TESTING_SECRET');
        $delegate = '032fcfd19f0e095bf46bd3ada87e283720c405249b1be1a70bad1d5f20095a8515';
        $secondSecret = env('ARK_TESTING_SECOND_SECRET');

        // Act...
        $response = $this->getClient()->api('Vote')->unvote($secret, $delegate, $secondSecret);

        // Assert...
        $this->assertInstanceOf('Illuminate\Support\Collection', $response);
    }

    /** @test */
    public function delegate_vote_argument_error()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->getClient()->api('Vote')->vote('some secret', ['too', 'many', 'delegates']);
    }

    /** @test */
    public function delegate_unvote_argument_error()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->getClient()->api('Vote')->unvote('some secret', ['too', 'many', 'delegates']);
    }
}
