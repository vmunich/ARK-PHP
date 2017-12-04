# Initialization

## Initialize Client

```php
$client = new BrianFaust\Ark\Client('your-node-ip', 4001, 'your-nethash', 'your-version', 'nucleid-arkjs-path');
```

## Sending Requests

Sending requests is as easy as choosing the API you want to use and what method. All requests will throw an `BrianFaust\Ark\Exceptions\InvalidResponseException` if the `success` field from the `ark-node` response equals `false`. This double-checking had to be done internal because `ark-node` will always return a status-code `200` on requests that go through but fail validation for example, so relying on checking for a 422 status-code wouldn't work in that case.

```php
try {
    $response = $client->api('Peer')->version();

    dd('Everything OK!', $response);
} catch(BrianFaust\Ark\Exceptions\InvalidResponseException $e) {
    dd($e->getMessage());
}
```
