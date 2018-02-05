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

class Block extends AbstractAPI
{
    /**
     * Get block by id.
     *
     * @param string $id
     *
     * @return \Illuminate\Support\Collection
     */
    public function block(string $id): Collection
    {
        return $this->get('api/blocks/get', compact('id'));
    }

    /**
     *  Get all blocks.
     *
     * @param array $parameters
     *
     * @return \Illuminate\Support\Collection
     */
    public function blocks(array $parameters = []): Collection
    {
        return $this->get('api/blocks', $parameters);
    }

    /**
     * Get the blockchain epoch.
     *
     * @return \Illuminate\Support\Collection
     */
    public function epoch(): Collection
    {
        return $this->get('api/blocks/getEpoch');
    }

    /**
     * Get the blockchain height.
     *
     * @return \Illuminate\Support\Collection
     */
    public function height(): Collection
    {
        return $this->get('api/blocks/getHeight');
    }

    /**
     * Get the blockchain nethash.
     *
     * @return \Illuminate\Support\Collection
     */
    public function nethash(): Collection
    {
        return $this->get('api/blocks/getNethash');
    }

    /**
     * Get the transaction fee for sending "normal" transactions.
     *
     * @return \Illuminate\Support\Collection
     */
    public function fee(): Collection
    {
        return $this->get('api/blocks/getFee');
    }

    /**
     * Get the network fees.
     *
     * @return \Illuminate\Support\Collection
     */
    public function fees(): Collection
    {
        return $this->get('api/blocks/getFees');
    }

    /**
     * Get the blockchain milestone.
     *
     * @return \Illuminate\Support\Collection
     */
    public function milestone(): Collection
    {
        return $this->get('api/blocks/getMilestone');
    }

    /**
     * Get the blockchain reward.
     *
     * @return \Illuminate\Support\Collection
     */
    public function reward(): Collection
    {
        return $this->get('api/blocks/getReward');
    }

    /**
     * Get the blockchain supply.
     *
     * @return \Illuminate\Support\Collection
     */
    public function supply(): Collection
    {
        return $this->get('api/blocks/getSupply');
    }

    /**
     * Get the blockchain status.
     *
     * @return \Illuminate\Support\Collection
     */
    public function status(): Collection
    {
        return $this->get('api/blocks/getStatus');
    }
}
