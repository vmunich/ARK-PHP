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
}
