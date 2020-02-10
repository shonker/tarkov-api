<?php

namespace TarkovAPI;

use TarkovAPI\API\TarkovAuth;
use TarkovAPI\API\TarkovLauncher;

class Tarkov
{
    public function launcher()
    {
        return (new TarkovLauncher());
    }

    public function auth()
    {
        return (new TarkovAuth());
    }
}
