<?php

namespace TarkovAPI\API;

use GuzzleHttp\RequestOptions;
use TarkovAPI\Config\Config;
use TarkovAPI\Structs\HTTP;
use TarkovAPI\Structs\TarkovResponse;
use TarkovAPI\Utils\HWID;

class TarkovMap extends TarkovClient
{
    const ENDPOINT_WEATHER = 'https://%s/client/weather';

    public function getWeather(): TarkovResponse
    {
        $url = sprintf(
            self::ENDPOINT_WEATHER,
            Config::PROD_ENDPOINT
        );

        return $this->requestGame(HTTP::POST, $url);
    }
}
