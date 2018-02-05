# Initialization

## Initialize Client

```php
$config = new BrianFaust\Ark\Config(
    'http',
    '138.197.206.43',
    4002,
    '578e820911f24e039733b45e4882b73e301f813a0d2c31330dafda84534ffa23',
    '1.1.1',
    '1E'
);

$client = new BrianFaust\Ark\Client($config);
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
