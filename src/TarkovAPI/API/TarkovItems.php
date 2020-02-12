<?php

namespace TarkovAPI\API;

use GuzzleHttp\RequestOptions;
use TarkovAPI\Config\Config;
use TarkovAPI\Structs\HTTP;
use TarkovAPI\Structs\TarkovResponse;
use TarkovAPI\Utils\HWID;

class TarkovItems extends TarkovClient
{
    const ENDPOINT_ITEMS_LIST = 'https://%s/client/items';
    
    /**
     * Get a list of all items
     */
    public function getItems(): TarkovResponse
    {
        $url = sprintf(
            self::ENDPOINT_ITEMS_LIST,
            Config::PROD_ENDPOINT
        );

        return $this->requestGame(HTTP::POST, $url, [
            RequestOptions::JSON => [
                'crc' => 0
            ]
        ]);
    }
}
