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

class Vote extends AbstractAPI
{
    /**
     * @param string $secret
     * @param string $delegate
     * @param string $secondSecret
     *
     * @return \Illuminate\Support\Collection
     */
    public function vote(string $secret, array $delegates, ?string $secondSecret = null): Collection
    {
        return $this->post('peer/transactions', [
            'transactions' => [
                $this->client->transactionBuilder->createVote($delegates, $secret, $secondSecret, $this->client->network)
            ]
        ]);
    }

    /**
     * @param string $secret
     * @param string $delegate
     * @param string $secondSecret
     *
     * @return \Illuminate\Support\Collection
     */
    public function unvote(string $secret, array $delegates, ?string $secondSecret = null): Collection
    {
        return $this->post('peer/transactions', [
            'transactions' => [
                $this->client->transactionBuilder->createVote($delegates, $secret, $secondSecret, $this->client->network)
            ]
        ]);
    }
}
