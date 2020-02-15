<?php

namespace TarkovAPI;

use TarkovAPI\API\TarkovAuth;
use TarkovAPI\API\TarkovGeneral;
use TarkovAPI\API\TarkovItems;
use TarkovAPI\API\TarkovLauncher;
use TarkovAPI\API\TarkovMail;
use TarkovAPI\API\TarkovMap;
use TarkovAPI\API\TarkovMarket;
use TarkovAPI\API\TarkovProfile;
use TarkovAPI\API\TarkovTrading;

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
    
    public function general()
    {
        return (new TarkovGeneral());
    }
    
    public function items()
    {
        return (new TarkovItems());
    }
    
    public function map()
    {
        return (new TarkovMap());
    }
    
    public function trading()
    {
        return (new TarkovTrading());
    }
    
    public function market()
    {
        return (new TarkovMarket());
    }
    
    public function mail()
    {
        return (new TarkovMail());
    }
}
