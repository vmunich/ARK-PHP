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

class Account extends AbstractAPI
{
    /**
     * Get the balance of an account.
     *
     * @param string $address
     *
     * @return \Illuminate\Support\Collection
     */
    public function balance(string $address): Collection
    {
        return $this->get('api/accounts/getBalance', compact('address'));
    }

    /**
     * Get the public key of an account.
     *
     * @param string $address
     *
     * @return \Illuminate\Support\Collection
     */
    public function publickey(string $address): Collection
    {
        return $this->get('api/accounts/getPublickey', compact('address'));
    }

    /**
     * Get the delegates of an account.
     *
     * @param string $address
     *
     * @return \Illuminate\Support\Collection
     */
    public function delegates(string $address): Collection
    {
        return $this->get('api/accounts/delegates', compact('address'));
    }

    /**
     * Get the delegate fee of an account.
     *
     * @param string $address
     *
     * @return \Illuminate\Support\Collection
     */
    public function delegatesFee(string $address): Collection
    {
        return $this->get('api/accounts/delegates/fee', compact('address'));
    }

    /**
     * Vote for the given delegate.
     *
     * @param string $secret
     * @param string $publicKey
     * @param string $secondSecret
     *
     * @return \Illuminate\Support\Collection
     */
    public function vote(string $secret, string $publicKey, string $secondSecret): Collection
    {
        return $this->put('api/accounts/delegates', compact('secret', 'publicKey', 'secondSecret'));
    }

    /**
     * Returns account information of an address.
     *
     * @param string $address
     *
     * @return \Illuminate\Support\Collection
     */
    public function account(string $address): Collection
    {
        return $this->get('api/accounts', compact('address'));
    }

    /**
     * Get a list of accounts.
     *
     * @return \Illuminate\Support\Collection
     */
    public function accounts(): Collection
    {
        return $this->get('api/accounts/getAllAccounts');
    }

    /**
     * Get a list of top accounts.
     *
     * @return \Illuminate\Support\Collection
     */
    public function top(): Collection
    {
        return $this->get('api/accounts/top');
    }

    /**
     * Get the count of accounts.
     *
     * @return \Illuminate\Support\Collection
     */
    public function count(): Collection
    {
        return $this->get('api/accounts/count');
    }
}
