# Block

## Get block by id.

```php
$client->api('Block')->block(string $id);
```

##  Get all blocks.

```php
$client->api('Block')->blocks(array $parameters = []);
```

## Get the blockchain epoch.

```php
$client->api('Block')->epoch();
```

## Get the blockchain height.

```php
$client->api('Block')->height();
```

## Get the blockchain nethash.

```php
$client->api('Block')->nethash();
```

## Get the transaction fee for sending "normal" transactions.

```php
$client->api('Block')->fee();
```

## Get the network fees.

```php
$client->api('Block')->fees();
```

## Get the blockchain milestone.

```php
$client->api('Block')->milestone();
```

## Get the blockchain reward.

```php
$client->api('Block')->reward();
```

## Get the blockchain supply.

```php
$client->api('Block')->supply();
```

## Get the blockchain status.

```php
$client->api('Block')->status();
```
