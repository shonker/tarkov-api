<?php

namespace TarkovAPI\API;

use GuzzleHttp\RequestOptions;
use TarkovAPI\Config\Config;
use TarkovAPI\Structs\HTTP;
use TarkovAPI\Utils\HWID;

class TarkovAuth extends TarkovClient
{
    const ENDPOINT_LAUNCHER_LOGIN = 'https://%s/launcher/login?launcherVersion=%s&branch=%s';
    const ENDPOINT_LAUNCHER_GAME_START = 'https://%s/launcher/game/start?launcherVersion=%s&branch=%s';

    private $aid;
    private $lang;
    private $region;
    private $gameVersion;
    private $dataCenters;
    private $ipRegion;

    // token vars
    private $tokenType;
    private $expiresIn;
    private $accessToken;
    private $refreshToken;

    public function login(string $email, string $password)
    {
        $hwid = (new HWID())->get();

        // build login JSON body
        $body = json_encode([
            'email'     => $email,
            'pass'      => bin2hex(md5($password)),
            'hwCode'    => $hwid,
            'captcha'   => null
        ]);

        $url = sprintf(
            self::ENDPOINT_LAUNCHER_LOGIN,
            Config::LAUNCHER_ENDPOINT,
            Config::LAUNCHER_VERSION,
            Config::GAME_BRANCH
        );

        // request login
        $response = $this->request(HTTP::POST, $url, [
            RequestOptions::JSON => $body
        ]);

        print_r([
            'response' => $response
        ]);

        die;
    }

    public function exchangeAccessToken($accessToken, $hwid)
    {
        $url = sprintf(
            self::ENDPOINT_LAUNCHER_GAME_START,
            Config::PROD_ENDPOINT,
            Config::LAUNCHER_VERSION,
            Config::GAME_BRANCH
        );

        // request access token
        $response = $this->request(HTTP::POST, $url, [
            RequestOptions::HEADERS => [
                'Authorization' => $accessToken
            ],
            RequestOptions::JSON => [
                'version' => [
                    'major' => Config::GAME_VERSION,
                    'game' => Config::GAME_BRANCH,
                    'backend' => Config::GAME_BACKEND_SINGLETON
                ],
                'hwCode' => $hwid
            ]
        ]);

        print_r([
            'response' => $response
        ]);

        die;
    }
}
