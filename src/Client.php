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

namespace BrianFaust\Ark;

use BrianFaust\Http\Http;

class Client
{
    /** @var \BrianFaust\Ark\Config */
    public $protocol;

    /**
     * Create a new Ark client instance.
     *
     * @param \BrianFaust\Ark\Config $config
     */
    public function __construct(Config $config)
    {
        $this->config = $config;
        $this->transactionBuilder = new TransactionBuilder($config->network);
    }

    /**
     * @param string $name
     *
     * @return \BrianFaust\Ark\API\AbstractAPI
     */
    public function api(string $name): API\AbstractAPI
    {
        $client = Http::withBaseUri("{$this->config->protocol}://{$this->config->ip}:{$this->config->port}/")->withHeaders([
            'nethash' => $this->config->nethash,
            'version' => $this->config->version,
            'port'    => 1,
        ]);

        $class = "BrianFaust\\Ark\\API\\{$name}";

        return new $class($this, $client);
    }
}
