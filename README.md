# Tarkov API (PHP)

> ⚠️ You will 100% get banned for using the bot code in the bot folder if you don't know what you're doing... Try understand the code first. I will not be supporting this since BSG ban for high volume requests and it's the only interest I had.


## Market bot

- Edit: `bot/bot_shopping_list.php` with shit you want
- Rename `login_example.php` to `login.php` and fill it out
- `composer install` at root all your shit
- run bot in the bot folder: `php bot`
- check market: `php flea <id>` or `php flea mine` for your shopping list

____

There's no documentation with this, ~if BGS don't start banning I might improve it and provide documentation~. To use this you must know how to include PHP packages into your library via composer, and then checkout bin/app for examples. A lot is hardcoded (like roubles and such) for my own use... ~Again if no bans are triggered I might generalise and improve this. For now it's for education purposes...~ Good luck.

- Requirement: PHP 7.3+
- Run: `composer install`
- copy `bot/login_example.php` to `bot/login.php`
- Usage: `php example.php` 

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
