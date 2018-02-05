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

use BrianFaust\Ark\Client;
use BrianFaust\Http\HttpResponse;
use Illuminate\Support\Collection;
use BrianFaust\Http\PendingHttpRequest;
use BrianFaust\Ark\Exceptions\InvalidResponseException;

abstract class AbstractAPI
{
    /**
     * @var \BrianFaust\Ark\Client
     */
    protected $client;

    /**
     * @var \BrianFaust\Http\PendingHttpRequest
     */
    protected $http;

    /**
     * Create a new API class instance.
     *
     * @param \BrianFaust\Ark\Client $client
     * @param \BrianFaust\Http\PendingHttpRequest $http
     */
    public function __construct(Client $client, PendingHttpRequest $http)
    {
        $this->client = $client;
        $this->http = $http;
    }

    /**
     * Create and send an Http "GET" request.
     */
    protected function get(string $url, array $params = []): Collection
    {
        return $this->handle($this->http->get($url, $params));
    }

    /**
     * Create and send an Http "POST" request.
     */
    protected function post(string $url, array $params = []): Collection
    {
        return $this->handle($this->http->post($url, $params));
    }

    /**
     * Create and send an Http "PUT" request.
     */
    protected function put(string $url, array $params = []): Collection
    {
        return $this->handle($this->http->put($url, $params));
    }

    /**
     * Create and send an Http "PATCH" request.
     */
    protected function patch(string $url, array $params = []): Collection
    {
        return $this->handle($this->http->patch($url, $params));
    }

    /**
     * Create and send an Http "DELETE" request.
     */
    protected function delete(string $url, array $params = []): Collection
    {
        return $this->handle($this->http->delete($url, $params));
    }

    /**
     * Handle the response format ark-node uses.
     */
    protected function handle(HttpResponse $response): Collection
    {
        $body = $response->json();

        if (! $body['success']) {
            throw new InvalidResponseException($body['error']);
        }

        return (new Collection($body))->except('success');
    }
}
