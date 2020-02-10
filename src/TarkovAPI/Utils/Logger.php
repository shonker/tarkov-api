<?php

namespace TarkovAPI\Utils;

use Monolog\Logger as MonoLogger;
use Monolog\Handler\StreamHandler;

class Logger
{
    public $log;

    public function __construct(string $name = 'General')
    {
        $this->log = new MonoLogger(sprintf('[TarkovAPI][%s]', $name));
        $this->log->pushHandler(new StreamHandler('php://stdout', MonoLogger::DEBUG));
    }
}
