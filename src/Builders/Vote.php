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

class Vote extends AbstractBuilder
{
    /**
     * Create a new signed vote object.
     *
     * @param string $secret
     * @param string $delegate
     * @param string $secondSecret
     *
     * @return \Illuminate\Support\Collection
     */
    public function create(string $secret, string $delegate, ?string $secondSecret)
    {
        return $this->build(
            'vote.createVote',
            compact('secret', 'delegate', 'secondSecret')
        );
    }

    /**
     * Create a new signed un-vote object.
     *
     * @param string $secret
     * @param string $delegate
     * @param string $secondSecret
     *
     * @return \Illuminate\Support\Collection
     */
    public function delete(string $secret, string $delegate, ?string $secondSecret)
    {
        return $this->build(
            'vote.deleteVote',
            compact('secret', 'delegate', 'secondSecret')
        );
    }
}
