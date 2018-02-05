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

namespace BrianFaust\Tests\Ark;

use BrianFaust\Ark\Config;
use BrianFaust\Tests\Ark\TestCase;

/**
 * @coversNothing
 */
class ConfigTest extends TestCase
{
    /** @test */
    public function config_has_right_props()
    {
        $config = new Config(
            'protocol',
            'ip',
            1234,
            'nethash',
            'version',
            '1E',
            'network'
        );

        $this->assertSame('protocol', $config->protocol);
        $this->assertSame('ip', $config->ip);
        $this->assertSame(1234, $config->port);
        $this->assertSame('nethash', $config->nethash);
        $this->assertSame('version', $config->version);
        $this->assertSame('1E', $config->networkAddress);
        $this->assertInstanceOf('BitWasp\Bitcoin\Network\Network', $config->network);
    }
}
