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
    const LIMIT = 25; // default limit
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
    
    const MARKET_TEMPLATE = '5449016a4bdc2d6f028b456f'; // fixed tpl for rubbles?
    
    const ENDPOINT_SEARCH = 'https://%s/client/ragfair/find';
    
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
}
