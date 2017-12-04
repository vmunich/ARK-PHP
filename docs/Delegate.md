# Delegate

## count

```php
$client->api('Delegate')->count();
```

## search

```php
$client->api('Delegate')->search(string $q, array $parameters = []);
```

## voters

```php
$client->api('Delegate')->voters(string $publicKey, array $parameters = []);
```

## delegate

```php
$client->api('Delegate')->delegate(array $parameters = []);
```

## delegates

```php
$client->api('Delegate')->delegates(array $parameters = []);
```

## fee

```php
$client->api('Delegate')->fee();
```

## forgedByAccount

```php
$client->api('Delegate')->forgedByAccount(string $generatorPublicKey);
```

## create

```php
$client->api('Delegate')->create(string $secret, string $username, ?string $secondSecret = null);
```


## vote

```php
$client->api('Delegate')->vote(string $secret, array $delegates, ?string $secondSecret = null);
```

## nextForgers

```php
$client->api('Delegate')->nextForgers();
```

## enableForging

```php
$client->api('Delegate')->enableForging(string $secret, array $parameters = []);
```

## disableForging

```php
$client->api('Delegate')->disableForging(string $secret, array $parameters = []);
```

## forgingStatus

```php
$client->api('Delegate')->forgingStatus(string $publicKey, array $parameters = []);
```
