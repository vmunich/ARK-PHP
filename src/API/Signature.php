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

class Signature extends AbstractAPI
{
    /**
     * Get the fee for a signature.
     *
     * @return \Illuminate\Support\Collection
     */
    public function fee(): Collection
    {
        return $this->get('api/signatures/fee');
    }

    /**
     * Create a new signature.
     *
     * @param string $secret
     * @param string $secondSecret
     *
     * @return \Illuminate\Support\Collection
     */
    public function create(string $secret, string $secondSecret): Collection
    {
        return $this->post('peer/transactions', [
            'transactions' => [
                $this->client->transactionBuilder->createSecondSignature($secondSecret, $secret),
            ],
        ]);
    }
}
