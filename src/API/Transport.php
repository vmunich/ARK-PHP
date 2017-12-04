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

namespace BrianFaust\Ark\API;

use Illuminate\Support\Collection;

class Transport extends AbstractAPI
{
    /**
     * Get a list of peers.
     *
     * @return \Illuminate\Support\Collection
     */
    public function list(): Collection
    {
        return $this->get('peer/list');
    }

    /**
     * Get a list of blocks by ids.
     *
     * @param array $ids
     *
     * @return \Illuminate\Support\Collection
     */
    public function blocksCommon(array $ids): Collection
    {
        return $this->get('peer/blocks/common', ['ids' => implode(',', $ids)]);
    }

    /**
     * Get all single block.
     *
     * @param string $id
     *
     * @return \Illuminate\Support\Collection
     */
    public function block(string $id): Collection
    {
        return $this->get('peer/block', compact('id'));
    }

    /**
     * Get all blocks.
     *
     * @return \Illuminate\Support\Collection
     */
    public function blocks(): Collection
    {
        return $this->get('peer/blocks');
    }

    /**
     * Create a new block.
     *
     * @param array $block
     *
     * @return \Illuminate\Support\Collection
     */
    public function createBlock(array $block): Collection
    {
        return $this->post('peer/blocks', compact('block'));
    }

    /**
     * Get all transactions.
     *
     * @return \Illuminate\Support\Collection
     */
    public function transactions(): Collection
    {
        return $this->get('peer/transactions');
    }

    /**
     * Get a list of transactions by ids.
     *
     * @param array $ids
     *
     * @return \Illuminate\Support\Collection
     */
    public function transactionsFromIds(array $ids): Collection
    {
        return $this->get('peer/transactionsFromIds', ['ids' => implode(',', $ids)]);
    }

    /**
     * Create a new transaction.
     *
     * @param array $transactions
     *
     * @return \Illuminate\Support\Collection
     */
    public function createTransactions(array $transactions): Collection
    {
        return $this->post('peer/transactions', compact('transactions'));
    }

    /**
     * Get the blockchain height.
     *
     * @return \Illuminate\Support\Collection
     */
    public function height(): Collection
    {
        return $this->get('peer/height');
    }

    /**
     * Get the blockchain status.
     *
     * @return \Illuminate\Support\Collection
     */
    public function status(): Collection
    {
        return $this->get('peer/status');
    }
}
