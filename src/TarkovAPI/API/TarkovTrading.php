<?php

namespace TarkovAPI\API;

use GuzzleHttp\RequestOptions;
use TarkovAPI\Config\Config;
use TarkovAPI\Structs\HTTP;
use TarkovAPI\Structs\TarkovResponse;
use TarkovAPI\Utils\HWID;

class TarkovTrading extends TarkovClient
{
    const ENDPOINT_TRADING_LIST = 'https://%s/client/trading/api/getTradersList';
    const ENDPOINT_TRADING_GET = 'https://%s/client/trading/api/getTrader/%s';

    public function getTraders(): TarkovResponse
    {
        $url = sprintf(
            self::ENDPOINT_TRADING_LIST,
            Config::TRADING_ENDPOINT
        );

        return $this->requestGame(HTTP::POST, $url);
    }

    public function getTrader(string $traderId): TarkovResponse
    {
        $url = sprintf(
            self::ENDPOINT_TRADING_LIST,
            Config::TRADING_ENDPOINT,
            $traderId
        );
    
        return $this->requestGame(HTTP::POST, $url);
    }
}
