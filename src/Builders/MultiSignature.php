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

class MultiSignature extends AbstractBuilder
{
    /**
     * Create a new signed multi signature object.
     *
     * @param string $secret
     * @param string $secondSecret
     * @param string $keysgroup
     * @param int    $lifetime
     * @param int    $min
     *
     * @return \Illuminate\Support\Collection
     */
    public function create(string $secret, string $secondSecret, string $keysgroup, int $lifetime, int $min)
    {
        return $this->build(
            'multisignature.createMultisignature',
            compact('secret', 'secondSecret', 'keysgroup', 'lifetime', 'min')
        );
    }
}
