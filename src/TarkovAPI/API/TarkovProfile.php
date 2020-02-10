<?php

namespace TarkovAPI\API;

use GuzzleHttp\RequestOptions;
use TarkovAPI\Config\Config;
use TarkovAPI\Structs\HTTP;
use TarkovAPI\Structs\TarkovResponse;
use TarkovAPI\Utils\HWID;

class TarkovProfile extends TarkovClient
{
    const ENDPOINT_PROFILE_LIST = 'https://%s/client/game/profile/list';

    public function getProfiles(string $session): TarkovResponse
    {
        // Build game headers
        $headers = TarkovClient::GAME_HEADERS;
        $headers['Cookie'] = sprintf($headers['Cookie'], $session);

        $url = sprintf(
            self::ENDPOINT_PROFILE_LIST,
            Config::PROD_ENDPOINT
        );

        // request login
        return $this->request(HTTP::POST, $url, [
            RequestOptions::HEADERS => $headers,
            RequestOptions::JSON => [
                'version' => [
                    'major'   => Config::GAME_VERSION,
                    'game'    => Config::GAME_BRANCH,
                    'backend' => Config::GAME_BACKEND_SINGLETON
                ],
                'hwCode' => (new HWID())->get()
            ]
        ]);
    }
}
