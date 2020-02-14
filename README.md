# Tarkov API (PHP)

Theres no documentation with this, if BGS don't start banning I might improve it and provide documentation. To use this you must know how to include PHP packages into your library via composer, and then checkout bin/app for examples. A lot is hardcoded (like roubles and such) for my own use... Again if no bans are triggered I might generalise and improve this. For now it's for education purposes... Good luck.

- Requirement: PHP 7.3+
- Run: `composer install`
- copy `bin/creds.json.dist` to `bin/creds.json`
- Usage: `php ./bin/app` 

```
todo - improve session handline and storage
todo - everything else...
```

# API

Init
```php
$api = new Tarkov();
```

Auth
```php
$api->auth()->login('email', 'pass');
$api->auth()->exchangeAccessToken('access_token');
$api->auth()->keepAlive();
```

Launcher
```php
$api->launcher()->checkLauncherVersion();
$api->launcher()->checkGameVersion();
```

Profile
```php
$api->profile()->getProfiles();
$api->profile()->selectProfile('user_id');
$api->profile()->stackItem('from_id', 'to_id');
$api->profile()->getRoubles('profile');
```

Market
```php
$api->market()->search(['filters'], 'page', 'limit');
$api->market()->buy('offer_id', 'quantity', 'barter_item');
$api->market()->sell(['items'], 'price', 'sellAll');
```

General
```php
$api->general()->getI18n('language');
```

Items
```php
$api->items()->getItems();
```

Map
```php
$api->map()->getWeather();
```

Trading
```php
$api->trading()->getTraders();
$api->trading()->getTrader('trader_id');
```




