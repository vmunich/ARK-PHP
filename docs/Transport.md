# Transport

## Get a list of peers.

```php
$client->api('Transport')->list();
```

## Get a list of blocks by ids.

```php
$client->api('Transport')->blocksCommon(array $ids);
```

## Get all single block.

```php
$client->api('Transport')->block(string $id);
```

## Get all blocks.

```php
$client->api('Transport')->blocks();
```

## Create a new block.

```php
$client->api('Transport')->createBlock(array $block);
```

## Get all transactions.

```php
$client->api('Transport')->transactions();
```

## Get a list of transactions by ids.

```php
$client->api('Transport')->transactionsFromIds(array $ids);
```

## Create a new transaction.

```php
$client->api('Transport')->createTransactions(array $transactions);
```

## Get the blockchain height.

```php
$client->api('Transport')->height();
```

## Get the blockchain status.

```php
$client->api('Transport')->status();
```
