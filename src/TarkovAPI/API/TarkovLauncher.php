<?php

namespace TarkovAPI\API;

use TarkovAPI\Config\Config;
use TarkovAPI\Structs\HTTP;

class TarkovLauncher extends TarkovClient
{
    const ENDPOINT_GET_LAUNCHER_DISTRIB = 'https://%s/launcher/GetLauncherDistrib';
    const ENDPOINT_GET_PATCH_LIST = 'https://%s/launcher/GetPatchList?launcherVersion=%s&branch=%s';

    public function checkLauncherVersion()
    {
        $url = sprintf(
            self::ENDPOINT_GET_LAUNCHER_DISTRIB,
            Config::LAUNCHER_ENDPOINT
        );

        $response = $this->request(HTTP::POST, $url);

        print_r([
            'response' => $response
        ]);

        die;
    }

    public function checkGameVersion()
    {
        $url = sprintf(
            self::ENDPOINT_GET_PATCH_LIST,
            Config::LAUNCHER_ENDPOINT,
            Config::LAUNCHER_VERSION,
            Config::GAME_BRANCH
        );

        $response = $this->request(HTTP::POST, $url);

        print_r([
            'response' => $response
        ]);

        die;
    }
}
