<?php

namespace TarkovAPI\Config;

/**
 * https://github.com/matias-kovero/tarkov/blob/master/lib/globals.js
 */
class Config
{
    // should be auto updated
    const GAME_VERSION = '0.12.3.5776';

    // game branch
    const GAME_BRANCH = 'live';

    // no idea wtf this is
    const GAME_BACKEND_SINGLETON = 6;

    // should be auto updated
    const LAUNCHER_VERSION = '0.9.2.970';

    // this need to be empty it will updated by script
    const UNITY_VERSION = '2018.4.13f1';

    // launcher backend
    const LAUNCHER_ENDPOINT = 'launcher.escapefromtarkov.com';

    // game backend
    const PROD_ENDPOINT = 'prod.escapefromtarkov.com';

    // trading backend
    const TRADING_ENDPOINT = 'trading.escapefromtarkov.com';

    // ragfair backend
    const RAGFAIR_ENDPOINT = 'ragfair.escapefromtarkov.com';

    // take that in mind to update it from time to time
    const USER_AGENT = 'UnityPlayer/2018.4.13f1 (UnityWebRequest/1.0, libcurl/7.52.0-DEV)';

    // i18n localizations strings
    const LOCAL_STRINGS = [];
}
