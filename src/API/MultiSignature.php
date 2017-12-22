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

class MultiSignature extends AbstractAPI
{
    /**
     * Get pending multi signature transactions.
     *
     * @param string $publicKey
     *
     * @return \Illuminate\Support\Collection
     */
    public function pending(string $publicKey): Collection
    {
        return $this->get('api/multisignatures/pending', compact('publicKey'));
    }

    /**
     * Sign a new multi signature.
     *
     * @param string $transactionId
     * @param string $secret
     * @param array  $parameters
     *
     * @return \Illuminate\Support\Collection
     */
    public function sign(string $transactionId, string $secret, array $parameters = []): Collection
    {
        return $this->post('api/multisignatures/sign', compact('transactionId', 'secret') + $parameters);
    }

    /**
     * Create a new multi signature.
     *
     * @param string $secret
     * @param string $secondSecret
     * @param string $keysgroup
     * @param int    $lifetime
     * @param int    $min
     *
     * @return \Illuminate\Support\Collection
     */
    public function create(string $secret, string $secondSecret, string $keysgroup, int $lifetime, int $min): Collection
    {
        return $this->post('peer/transactions', [
            'transactions' => [
                $this->client->builder('MultiSignature')->create(
                    $secret,
                    $secondSecret,
                    $keysgroup,
                    $lifetime,
                    $min
                )
            ]
        ]);
    }

    /**
     * Get a list of accounts.
     *
     * @param string $publicKey
     *
     * @return \Illuminate\Support\Collection
     */
    public function accounts(string $publicKey): Collection
    {
        return $this->get('api/multisignatures/accounts', compact('publicKey'));
    }
}
