<?php

namespace TarkovAPI;

use TarkovAPI\API\TarkovAuth;
use TarkovAPI\API\TarkovLauncher;
use TarkovAPI\API\TarkovProfile;

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
    
    public function profile()
    {
        return (new TarkovProfile());
    }
}
