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

class Loader extends AbstractAPI
{
    /**
     * Get the blockchain status.
     *
     * @return \Illuminate\Support\Collection
     */
    public function status(): Collection
    {
        return $this->get('api/loader/status');
    }

    /**
     * Get the synchronisation status of the client.
     *
     * @return \Illuminate\Support\Collection
     */
    public function sync(): Collection
    {
        return $this->get('api/loader/status/sync');
    }

    /**
     * Auto-configure the client loader.
     *
     * @return \Illuminate\Support\Collection
     */
    public function autoconfigure(): Collection
    {
        return $this->get('api/loader/autoconfigure');
    }
}
