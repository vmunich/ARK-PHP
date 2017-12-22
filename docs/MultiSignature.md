# Multi Signature

## Get pending multi signature transactions.

```php
$client->api('MultiSignature')->pending(string $publicKey);
```

## Sign a new multi signature.

```php
$client->api('MultiSignature')->sign(string $transactionId, string $secret, array $parameters = []);
```

## Create a new multi signature.

```php
$client->api('MultiSignature')->create(string $secret, string $secondSecret, string $keysgroup, int $lifetime, int $min);
```

## Get a list of accounts.

```php
$client->api('MultiSignature')->accounts(string $publicKey);
```
