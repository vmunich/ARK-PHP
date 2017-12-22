# Account

## Get the balance of an account.

```php
$client->api('Account')->balance(string $address);
```

## Get the public key of an account.

```php
$client->api('Account')->publickey(string $address);
```

## Get the delegates of an account.

```php
$client->api('Account')->delegates(string $address);
```

## Get the delegate fee of an account.

```php
$client->api('Account')->delegatesFee(string $address);
```

## Add a new delegate to an account.

```php
$client->api('Account')->createDelegates(string $secret, string $publicKey, string $secondSecret);
```

## Returns account information of an address.

```php
$client->api('Account')->account(string $address);
```

## Get a list of accounts.

```php
$client->api('Account')->accounts();
```

## Get a list of top accounts.

```php
$client->api('Account')->top();
```

## Get the count of accounts.

```php
$client->api('Account')->count();
```
