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

namespace BrianFaust\Ark;

use BitWasp\Bitcoin\Network\NetworkFactory;

class Config
{
    /** @var string */
    public $protocol;

    /** @var string */
    public $ip;

    /** @var int */
    public $port;

    /** @var string */
    public $nethash;

    /** @var string */
    public $version;

    /** @var string */
    public $networkAddress;

    /** @var \BitWasp\Bitcoin\Network\NetworkFactory */
    public $network;

    /**
     * Create a new Ark client instance.
     *
     * @param string $protocol
     * @param string $ip
     * @param int    $port
     * @param string $nethash
     * @param string $version
     * @param \BitWasp\Bitcoin\Network\NetworkFactory $networkAddress
     */
    public function __construct(string $protocol, string $ip, int $port, string $nethash, string $version, string $networkAddress)
    {
        $this->protocol = $protocol;
        $this->ip = $ip;
        $this->port = $port;
        $this->nethash = $nethash;
        $this->version = $version;
        $this->networkAddress = $networkAddress;
        $this->network = NetworkFactory::create($networkAddress, '00', '00');
    }
}
