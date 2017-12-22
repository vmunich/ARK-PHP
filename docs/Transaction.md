# Transactions

## Get a single transaction.

```php
$client->api('Transaction')->transaction(string $id);
```

## Get all transactions.

```php
$client->api('Transaction')->transactions(array $parameters = []);
```

## Get a single unconfirmed transaction.

```php
$client->api('Transaction')->unconfirmedTransaction(string $id);
```

## Get all unconfirmed transactions.

```php
$client->api('Transaction')->unconfirmedTransactions(array $parameters = []);
```

## Create a new transaction.

```php
$client->api('Transaction')->create(string $recipientId, int $amount, string $vendorField, string $secret, ?string $secondSecret = null);
```
