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
use InvalidArgumentException;

class Vote extends AbstractAPI
{
    /**
     * @param string $secret
     * @param array $delegate
     * @param string $secondSecret
     *
     * @return \Illuminate\Support\Collection
     */
    public function vote(string $secret, array $delegate, ?string $secondSecret = null): Collection
    {
        $this->raiseIfInvalidDelegate($delegate);

        $delegate = $this->formatDelegate($delegate, '+');
        return $this->post('peer/transactions', [
            'transactions' => [
                $this->client->transactionBuilder->createVote($delegate, $secret, $secondSecret, $this->client->network)
            ]
        ]);
    }

    /**
     * @param string $secret
     * @param array $delegate
     * @param string $secondSecret
     *
     * @return \Illuminate\Support\Collection
     */
    public function unvote(string $secret, array $delegate, ?string $secondSecret = null): Collection
    {
        $this->raiseIfInvalidDelegate($delegate);

        $delegate = $this->formatDelegate($delegate, '-');
        return $this->post('peer/transactions', [
            'transactions' => [
                $this->client->transactionBuilder->createVote($delegate, $secret, $secondSecret, $this->client->network)
            ]
        ]);
    }

    private function raiseIfInvalidDelegate($delegate) {
        if (count($delegate) != 1)
        {
            throw new InvalidArgumentException('$delegate must be an array of one delegate address');
        }
    }

    private function formatDelegate(array $delegate, string $prependCharacter)
    {
        $address = $delegate[0];

        if (substr($address, 0, 1) != $prependCharacter) {
             return [$prependCharacter . $address];
        }

        return $delegate;
    }
}
