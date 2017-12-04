### Calculator

```php
$calculator = new BrianFaust\Ark\Utils\Calculator(422, 75);
$calculator->setVotingPool(1000000);

dump($calculator->perSecond(10000));
dump($calculator->perMinute(10000));
dump($calculator->perHour(10000));
dump($calculator->perDay(10000));
dump($calculator->perWeek(10000));
dump($calculator->perMonth(10000));
dump($calculator->perYear(10000));
```
