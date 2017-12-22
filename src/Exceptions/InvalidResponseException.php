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

namespace BrianFaust\Ark\Exceptions;

use RuntimeException;

class InvalidResponseException extends RuntimeException
{
    /**
     * Create a new exception instance.
     *
     * @param null|string $message
     */
    public function __construct(?string $message)
    {
        parent::__construct($message);
    }
}
