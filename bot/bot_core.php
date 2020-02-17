<?php

use Carbon\Carbon;
use Symfony\Component\Console\Output\ConsoleOutput;

// Include Composer Autoload
require_once __DIR__ . '/../vendor/autoload.php';

// Some defines
define('LOG_FILENAME', __DIR__ . '/bot.log');
define('SNIPE_FILENAME', __DIR__ . '/snipes.txt');

// Initialise console output file
$consoleOutput = new ConsoleOutput();

// start time
$startTime = time();

/**
 * Reset the log file
 */
function logReset() {
    @unlink(LOG_FILENAME);
    @unlink(SNIPE_FILENAME);
}

/**
 * Write to the log
 */
function console($text) {
    global $consoleOutput, $startTime;
    
    if (is_array($text)) {
        foreach ($text as $t) {
            console($t);
        }
        
        return;
    }
    
    // Current time
    $date = date('D dS H:i');

    // work out how long the bots been running for
    $diff = Carbon::createFromTimestamp($startTime)->diff(Carbon::now());

    // setup line
    // colors = black, red, green, yellow, blue, magenta, cyan, white, default)
    $line = "[{$date} | {$diff->h} hr {$diff->i} min]  {$text}";
    file_put_contents(LOG_FILENAME, strip_tags($line) . PHP_EOL, FILE_APPEND);
    $consoleOutput->writeln($line);
}

/**
 * Write an error (dies)
 */
function error(string $text) {
    console("<error>{$text}</error>");
    die;
}

function snipe(string $text) {
    file_put_contents(SNIPE_FILENAME, $text . PHP_EOL, FILE_APPEND);
}



