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

namespace BrianFaust\Ark\Builders;

class Transaction extends AbstractBuilder
{
    /**
     * Create a new signed transaction object.
     *
     * @param string      $recipientId
     * @param int         $amount
     * @param string      $vendorField
     * @param string      $secret
     * @param null|string $secondSecret
     *
     * @return \Illuminate\Support\Collection
     */
    public function create(string $recipientId, int $amount, string $vendorField, string $secret, ?string $secondSecret = null)
    {
        return $this->build(
            'transaction.createTransaction',
            compact('recipientId', 'amount', 'vendorField', 'secret', 'secondSecret')
        );
    }
}
