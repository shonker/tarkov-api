<?php

// composer auto loader
require __DIR__ . '/vendor/autoload.php';

if (!is_dir(__DIR__ . '/../data')) {
    mkdir(__DIR__ . '/../data');
}

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use TarkovAPI\Tarkov;
use TarkovAPI\Session\TarkovSession;
use TarkovAPI\API\TarkovMarket;

// Setup logging
$log = new Logger('tarkov.bin.app');
$log->pushHandler(new StreamHandler('php://stdout', Logger::DEBUG));

// Setup API
$api = new Tarkov();

//
// ----------------------------------------------------------------------
//

// Check if launcherVersion is up-to-date
#$log->info('launcher -> checkLauncherVersion');
#$api->launcher()->checkLauncherVersion();


// Check if gameVersion is up-to-date
#$log->info('launcher -> checkGameVersion');
#$api->launcher()->checkGameVersion();

// Initialize our session
TarkovSession::init();

// attempt to keep session alive
$alive = $api->auth()->keepAlive();
$log->info("Alive check");
print_r($alive);

// if empty, start a new login
if (!TarkovSession::has('session') || $alive->getError()) {
    // Login (get your creds however you want... file, json, hardcode..., whatever)
    $log->info('launcher -> login');
    
    $creds = require_once __DIR__.'/bot/login.php';
    $login = $api->auth()->login($creds->email, $creds->password);

    // Exchange token
    $session = $api->auth()->exchangeAccessToken($login->getData()->access_token);

    // Saving my session token
    TarkovSession::store('session', $session->getData()->session);
    
    // wipe character login
    TarkovSession::delete('player');
}

$log->info("Tarkov account logged in");

// attempt to select player
if (!TarkovSession::has('player')) {
    // Get Profiles
    $profiles = $api->profile()->getProfiles();
    file_put_contents(__DIR__ . '/../data/profiles.json', json_encode($profiles->getData(), JSON_PRETTY_PRINT));
    
    foreach ($profiles->getData() as $profile) {
        $userId = $profile->_id;
        $name   = $profile->Info->Nickname;
        $log->info("ID: {$userId} - Name {$name}");
    }

    // select player 2
    $player2 = $profiles->getData()[1];
    TarkovSession::store('player', $player2->_id);
    $log->info("Player 2 selected: {$player2->Info->Nickname}");
    
    // save player
    file_put_contents(__DIR__ . '/../data/player.json', json_encode($player2, JSON_PRETTY_PRINT));
    
    // login to player 2
    $login = $api->profile()->selectProfile($player2->_id);
    $log->info("Logged into player 2");
    print_r($login);
}

$player = json_decode(file_get_contents(__DIR__ . '/../data/player.json'));
print_r($player->Info);

// get all roubles
$roubles = $api->profile()->getRoubles($player);
$roublesStackId = $roubles['stacks'][0]['id'];
print_r([
    "rouble_stacks" => $roubles['stacks']
]);
$log->info("You have {$roubles['total_str']} roubles. First stack id = {$roublesStackId}");


// search for an item to buy
// item ids: https://pastebin.com/D4pSKvA6
$itemId = '5672cb124bdc2d1a0f8b4568';

$listings = $api->market()->search([
    'handbookId' => $itemId
]);

file_put_contents(__DIR__ . '/../data/listings.json', json_encode($listings->getData(), JSON_PRETTY_PRINT));

die;

// grab offer
$offer = $listings->getData()->offers[0];
$itemOffer  = $offer->_id;
$quantity   = $offer->items[0]->upd->StackObjectsCount;
$cost       = $offer->requirementsCost;
print_r($offer);

$log->info("Item: {$itemOffer} as ${quantity} up for {$cost} each");

// buy first item
$log->info("Attempting to buy item");
$buy = $api->market()->buy($itemOffer, 1, [
    'id' => $roublesStackId,
    'count' => $cost,
]);

if ($buy->getError()) {
    $log->error("Error: {$buy->getErrorMessage()}");
}

print_r($buy);

$purchasedItemId = $buy->getData()->items->new[0]->_id;

$log->info("Attempting to sell item just purchased: {$purchasedItemId}");
sleep(1);

// now try sell it (for same amount, just to test)
$sell = $api->market()->sell([$purchasedItemId], $cost + 5000);

print_r($sell);
