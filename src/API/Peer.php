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

namespace BrianFaust\Ark\API;

use Illuminate\Support\Collection;

class Peer extends AbstractAPI
{
    /**
     * Get a single peer.
     *
     * @param string $ip
     * @param int    $port
     *
     * @return \Illuminate\Support\Collection
     */
    public function peer(string $ip, int $port): Collection
    {
        return $this->get('api/peers/get', compact('ip', 'port'));
    }

    /**
     * Get all peers.
     *
     * @param array $parameters
     *
     * @return \Illuminate\Support\Collection
     */
    public function peers(array $parameters = []): Collection
    {
        return $this->get('api/peers', $parameters);
    }

    /**
     * Get the peer version.
     *
     * @return \Illuminate\Support\Collection
     */
    public function version(): Collection
    {
        return $this->get('api/peers/version');
    }
}
