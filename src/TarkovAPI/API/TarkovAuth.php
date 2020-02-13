<?php

namespace TarkovAPI\API;

use GuzzleHttp\RequestOptions;
use TarkovAPI\Config\Config;
use TarkovAPI\Structs\HTTP;
use TarkovAPI\Structs\TarkovResponse;
use TarkovAPI\Utils\HWID;

class TarkovAuth extends TarkovClient
{
    const ENDPOINT_LAUNCHER_LOGIN = 'https://%s/launcher/login?launcherVersion=%s&branch=%s';
    const ENDPOINT_LAUNCHER_GAME_START = 'https://%s/launcher/game/start?launcherVersion=%s&branch=%s';
    const ENDPOINT_KEEP_ALIVE = 'https://%s/client/game/keepalive';

    public function login(string $email, string $password): TarkovResponse
    {
        // build login JSON body
        $body = [
            'email'     => $email,
            'pass'      => md5($password),
            'hwCode'    => (new HWID())->get(),
            'captcha'   => null
        ];

        $url = sprintf(
            self::ENDPOINT_LAUNCHER_LOGIN,
            Config::LAUNCHER_ENDPOINT,
            Config::LAUNCHER_VERSION,
            Config::GAME_BRANCH
        );

        // request login
        return $this->requestWeb(HTTP::POST, $url, [
            RequestOptions::JSON => $body
        ]);
    }

    public function exchangeAccessToken($accessToken)
    {
        $url = sprintf(
            self::ENDPOINT_LAUNCHER_GAME_START,
            Config::PROD_ENDPOINT,
            Config::LAUNCHER_VERSION,
            Config::GAME_BRANCH
        );

        // request access token
        return $this->requestWeb(HTTP::POST, $url, [
            RequestOptions::HEADERS => [
                'Authorization' => $accessToken,
                'Host' => Config::PROD_ENDPOINT
            ],
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
    
    public function keepAlive()
    {
        $url = sprintf(
            self::ENDPOINT_KEEP_ALIVE,
            Config::PROD_ENDPOINT
        );
        
        return $this->requestGame(HTTP::POST, $url);
    }
}
