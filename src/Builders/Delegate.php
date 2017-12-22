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

class Delegate extends AbstractBuilder
{
    /**
     * Create a new signed delegate object.
     *
     * @param string $secret
     * @param string $username
     * @param string $secondSecret
     *
     * @return \Illuminate\Support\Collection
     */
    public function create(string $secret, string $username, string $secondSecret)
    {
        return $this->build(
            'delegate.createDelegate',
            compact('secret', 'username', 'secondSecret')
        );
    }
}
