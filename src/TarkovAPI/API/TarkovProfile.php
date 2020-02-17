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
    const ENDPOINT_PROFILE_MOVING = 'https://%s/client/game/profile/items/moving';

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
    
    /**
     * Stack items, eg 2 stacks of roubles.
     */
    public function stackItem($fromId, $toId, $count = null)
    {
        $url = sprintf(
            self::ENDPOINT_PROFILE_MOVING,
            Config::PROD_ENDPOINT
        );
        
        $body = [
            'tm' => 2,
            'data' => [
                [
                    'Action' => 'Merge',
                    'item' => $fromId,
                    'with' => $toId,
                ]
            ]
        ];
        
        if ($count) {
            $body['data'][0]['count'] = $count;
            $body['data'][0]['Action'] = 'Transfer';
        }
    
        return $this->requestGame(HTTP::POST, $url, [
            RequestOptions::JSON => $body,
        ]);
    }
    
    public function getRoubles($profile)
    {
        if (empty($profile->Inventory->items)) {
            throw new \Exception("Invalid profile inventory, it's empty??");
        }
        
        $total = 0;
        $stacks = [];
        $biggestStack = 0;
        $biggestStackId = null;
        
        foreach ($profile->Inventory->items as $item) {
            if ($item->_tpl === TarkovMarket::TPL_ROUBLES) {
                $total += $item->upd->StackObjectsCount;
                $stacks[] = [
                    'id' => $item->_id,
                    'amount' => $item->upd->StackObjectsCount
                ];
                
                if ($biggestStack < $item->upd->StackObjectsCount) {
                    $biggestStack = $item->upd->StackObjectsCount;
                    $biggestStackId = $item->_id;
                }
            }
        }
        
        return [
            'total' => $total,
            'total_str' => number_format($total),
            'stacks' => $stacks,
            'stack_big_total' => $biggestStack,
            'stack_big_id' => $biggestStackId,
        ];
    }
}
