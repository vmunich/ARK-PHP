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

class Delegate extends AbstractAPI
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function count(): Collection
    {
        return $this->get('api/delegates/count');
    }

    /**
     * @param string $q
     * @param array  $parameters
     *
     * @return \Illuminate\Support\Collection
     */
    public function search(string $q, array $parameters = []): Collection
    {
        return $this->get('api/delegates/search', compact('q') + $parameters);
    }

    /**
     * @param string $publicKey
     * @param array  $parameters
     *
     * @return \Illuminate\Support\Collection
     */
    public function voters(string $publicKey, array $parameters = []): Collection
    {
        return $this->get('api/delegates/voters', compact('publicKey') + $parameters);
    }

    /**
     * @param array $parameters
     *
     * @return \Illuminate\Support\Collection
     */
    public function delegate(array $parameters = []): Collection
    {
        return $this->get('api/delegates/get', $parameters);
    }

    /**
     * @param array $parameters
     *
     * @return \Illuminate\Support\Collection
     */
    public function delegates(array $parameters = []): Collection
    {
        return $this->get('api/delegates', $parameters);
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function fee(): Collection
    {
        return $this->get('api/delegates/fee');
    }

    /**
     * @param string $generatorPublicKey
     *
     * @return \Illuminate\Support\Collection
     */
    public function forgedByAccount(string $generatorPublicKey): Collection
    {
        return $this->get('api/delegates/forging/getForgedByAccount', compact('generatorPublicKey'));
    }

    /**
     * @param string $secret
     * @param string $username
     * @param string $secondSecret
     *
     * @return \Illuminate\Support\Collection
     */
    public function create(string $secret, string $username, ?string $secondSecret = null): Collection
    {
        return $this->post('peer/transactions', [
            'transactions' => [
                $this->client->builder('Delegate')->create(
                    $secret,
                    $username,
                    $secondSecret
                )
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
    public function vote(string $secret, array $delegate, ?string $secondSecret = null): Collection
    {
        return $this->post('peer/transactions', [
            'transactions' => [
                $this->client->builder('Vote')->create(
                    $secret,
                    $delegate,
                    $secondSecret
                )
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
    public function unvote(string $secret, array $delegate, ?string $secondSecret = null): Collection
    {
        return $this->post('peer/transactions', [
            'transactions' => [
                $this->client->builder('Vote')->delete(
                    $secret,
                    $delegate,
                    $secondSecret
                )
            ]
        ]);
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function nextForgers(): Collection
    {
        return $this->get('api/delegates/getNextForgers');
    }

    /**
     * @param string $secret
     * @param array  $parameters
     *
     * @return \Illuminate\Support\Collection
     */
    public function enableForging(string $secret, array $parameters = []): Collection
    {
        return $this->post('api/delegates/forging/enable', compact('secret') + $parameters);
    }

    /**
     * @param string $secret
     * @param array  $parameters
     *
     * @return \Illuminate\Support\Collection
     */
    public function disableForging(string $secret, array $parameters = []): Collection
    {
        return $this->post('api/delegates/forging/disable', compact('secret') + $parameters);
    }

    /**
     * @param string $publicKey
     * @param array  $parameters
     *
     * @return \Illuminate\Support\Collection
     */
    public function forgingStatus(string $publicKey, array $parameters = []): Collection
    {
        return $this->get('api/delegates/forging/status', compact('publicKey') + $parameters);
    }
}
