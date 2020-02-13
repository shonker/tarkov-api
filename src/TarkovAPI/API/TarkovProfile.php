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
    const ENDPOINT_PROFILE_SELECT = 'https://%s/client/game/profile/select';

    public function getProfiles(): TarkovResponse
    {
        $url = sprintf(
            self::ENDPOINT_PROFILE_LIST,
            Config::PROD_ENDPOINT
        );

        return $this->requestGame(HTTP::POST, $url);
    }
    
    public function selectProfile(string $userId)
    {
        $url = sprintf(
            self::ENDPOINT_PROFILE_SELECT,
            Config::PROD_ENDPOINT
        );
    
        return $this->requestGame(HTTP::POST, $url, [
            RequestOptions::JSON => [
                'uid' => $userId
            ],
        ]);
    }
    
    public function getRoubles($profile)
    {
        if (empty($profile->Inventory->items)) {
            throw new \Exception("Invalid profile inventory, it's empty??");
        }
        
        $total = 0;
        $stacks = [];
        
        foreach ($profile->Inventory->items as $item) {
            if ($item->_tpl === TarkovMarket::TPL_ROUBLES) {
                $total += $item->upd->StackObjectsCount;
                $stacks[] = [
                    'id' => $item->_id,
                    'amount' => $item->upd->StackObjectsCount
                ];
            }
        }
        
        return [
            'total' => $total,
            'total_str' => number_format($total),
            'stacks' => $stacks,
        ];
    }
}
