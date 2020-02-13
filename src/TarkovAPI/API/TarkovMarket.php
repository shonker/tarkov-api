<?php

namespace TarkovAPI\API;

use GuzzleHttp\RequestOptions;
use TarkovAPI\Config\Config;
use TarkovAPI\Structs\HTTP;
use TarkovAPI\Structs\TarkovResponse;
use TarkovAPI\Utils\HWID;

class TarkovMarket extends TarkovClient
{
    const PAGE = 0; // default page
    const LIMIT = 10; // default limit
    const SORT_ID = 0;
    const SORT_BARTER = 2;
    const SORT_MECHANT_RATING = 3;
    const SORT_PRICE = 5;
    const SORT_EXPIRY = 6;
    const SORT_ASC = 0;
    const SORT_DESC = 1;
    const CURRENCY_ALL = 0;
    const CURRENCY_RUB = 1;
    const CURRENCY_USD = 2;
    const CURRENCY_EUR = 3;
    const TM = 1; // no idea wtf this is
    
    const TPL_ROUBLES = '5449016a4bdc2d6f028b456f'; // fixed tpl for rubbles?
    
    const ENDPOINT_SEARCH = 'https://%s/client/ragfair/find';
    const ENDPOINT_MARKET = 'https://%s/client/game/profile/items/moving';
    
    /**
     * Search for an item
     */
    public function search(array $filters = [], int $page = self::PAGE, int $limit = self::LIMIT): TarkovResponse
    {
        $url = sprintf(
            self::ENDPOINT_SEARCH,
            Config::RAGFAIR_ENDPOINT
        );

        return $this->requestGame(HTTP::POST, $url, [
            RequestOptions::JSON => [
                'page' => $page,
                'limit' => $limit,
                'sortType' => $filters['sortType'] ?? self::SORT_PRICE,
                'sortDirection' => $filters['sortDirection'] ?? self::SORT_ASC,
                'currency' => $filters['currency'] ?? self::CURRENCY_RUB,
                'priceFrom' => $filters['priceFrom'] ?? 0,
                'priceTo' => $filters['priceTo'] ?? 0,
                'quantityFrom' => $filters['quantityFrom'] ?? 0,
                'quantityTo' => $filters['quantityTo'] ?? 0,
                'conditionFrom' => $filters['conditionFrom'] ?? 0,
                'conditionTo' => $filters['conditionTo'] ?? 100,
                'oneHourExpiration' => $filters['oneHourExpiration'] ?? false,
                'removeBartering' => $filters['removeBartering'] ?? true,
                'offerOwnerType' => $filters['offerOwnerType'] ?? 0,
                'onlyFunctional' => $filters['onlyFunctional'] ?? true,
                'updateOfferCount' => $filters['updateOfferCount'] ?? true,
                'handbookId' => $filters['handbookId'] ?? "",
                'linkedSearchId' => $filters['linkedSearchId'] ?? "",
                'neededSearchId' => $filters['neededSearchId'] ?? "",
                'tm' => self::TM,
            ]
        ]);
    }
    
    public function buy(string $offerId, int $quantity, $barterItem)
    {
        $url = sprintf(
            self::ENDPOINT_MARKET,
            Config::PROD_ENDPOINT
        );
    
        // buy body
        $body = [
            'data' => [
                [
                    'Action' => 'RagFairBuyOffer',
                    'tm' => 2, // ???
                    'offers' => [
                        [
                            'id' => $offerId,
                            'count' => $quantity,
                            'items' => [
                                [
                                    'id' => $barterItem['id'],
                                    'count' => $barterItem['count']
                                ]
                            ]
                        ]
                    ]
                ]
            ]
        ];
    
        return $this->requestGame(HTTP::POST, $url, [
            RequestOptions::JSON => $body
        ]);
    }
    
    /**
     * requirements = [
     *  'price' => 123000,
     * ]
     */
    public function sell(array $items, int $price, $sellAll = false)
    {
        $url = sprintf(
            self::ENDPOINT_MARKET,
            Config::PROD_ENDPOINT
        );
        
        // sale body
        $body = [
            'data' => [
                [
                    'Action' => 'RagFairAddOffer',
                    'tm' => 2, // ???
                    'sellInOnePiece' => $sellAll,
                    'items' => $items,
                    'requirements' => [
                        [
                            '_tpl' => self::TPL_ROUBLES,
                            'count' => $price,
                            'level' => 0,
                            'side' => 0,
                            'onlyFunctional' => false,
                        ]
                    ]
                ]
            ]
        ];
        
        return $this->requestGame(HTTP::POST, $url, [
            RequestOptions::JSON => $body
        ]);
    }
}
