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

class Transaction extends AbstractAPI
{
    /**
     * Get a single transaction.
     *
     * @param string $id
     *
     * @return \Illuminate\Support\Collection
     */
    public function transaction(string $id): Collection
    {
        return $this->get('api/transactions/get', compact('id'));
    }

    /**
     * Get all transactions.
     *
     * @param array $parameters
     *
     * @return \Illuminate\Support\Collection
     */
    public function transactions(array $parameters = []): Collection
    {
        return $this->get('api/transactions', $parameters);
    }

    /**
     * Get a single unconfirmed transaction.
     *
     * @param string $id
     *
     * @return \Illuminate\Support\Collection
     */
    public function unconfirmedTransaction(string $id): Collection
    {
        return $this->get('api/transactions/unconfirmed/get', compact('id'));
    }

    /**
     * Get all unconfirmed transactions.
     *
     * @param array $parameters
     *
     * @return \Illuminate\Support\Collection
     */
    public function unconfirmedTransactions(array $parameters = []): Collection
    {
        return $this->get('api/transactions/unconfirmed', $parameters);
    }

    /**
     * Create a new transaction.
     *
     * @param string      $recipientId
     * @param int         $amount
     * @param string      $vendorField
     * @param string      $secret
     * @param null|string $secondSecret
     *
     * @return \Illuminate\Support\Collection
     */
    public function create(string $recipientId, int $amount, string $vendorField, string $secret, ?string $secondSecret = null): Collection
    {
        return $this->post('peer/transactions', [
            'transactions' => [
                $this->client->transactionBuilder->createNormal($recipientId, $amount, $vendorField, $secret, $secondSecret)
            ]
        ]);
    }

    /**
     * Create a new transaction from an already existing signed transaction object.
     *
     * @param object $transaction
     *
     * @return \Illuminate\Support\Collection
     */
    public function createFromSignedObject($transaction): Collection
    {
        return $this->post('peer/transactions', ['transactions' => [$transaction]]);
    }
}
