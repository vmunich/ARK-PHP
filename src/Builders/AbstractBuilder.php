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

use UnexpectedValueException;

abstract class AbstractBuilder
{
    /**
     * @var string
     */
    protected $nethash;

    /** @var array */
    protected $networks = [
        '6e84d08bd299ed97c212c886c98a57e36545c8f5d645ca7eeae63a8bd62d8988' => "0x17",
        '578e820911f24e039733b45e4882b73e301f813a0d2c31330dafda84534ffa23' => "0x1E",
    ];

    /**
     * Create a new Builder instance.
     */
    public function __construct(string $nethash)
    {
        $this->nethash = $nethash;
    }

    /**
     * Build the specified script via ARKJS.
     *
     * @param  string $script
     * @param  array  $data
     *
     * @return object
     */
    protected function build(string $script, array $data)
    {
        if (array_key_exists($this->nethash, $this->networks)) {
            $data['network'] = $this->networks[$this->nethash];
        }

        file_put_contents(
            $filename = __DIR__."/$script.js",
            $this->engine->load($script)->render($data)
        );

        $payload = json_decode($output = shell_exec("node $filename"));

        if (JSON_ERROR_NONE === json_last_error()) {
            unlink($filename);

            return $payload;
        }

        throw new UnexpectedValueException($output);
    }
}
