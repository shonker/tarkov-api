<?php

namespace TarkovAPI\API;

use GuzzleHttp\RequestOptions;
use TarkovAPI\Config\Config;
use TarkovAPI\Structs\HTTP;
use TarkovAPI\Structs\TarkovResponse;
use TarkovAPI\Utils\HWID;

class TarkovGeneral extends TarkovClient
{
    const ENDPOINT_I18N = 'https://%s/client/locale/%s';

    public function getI18n(string $language): TarkovResponse
    {
        $url = sprintf(
            self::ENDPOINT_I18N,
            Config::PROD_ENDPOINT,
            $language
        );

        return $this->requestGame(HTTP::POST, $url);
    }
}
