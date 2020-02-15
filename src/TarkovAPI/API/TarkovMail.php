<?php

namespace TarkovAPI\API;

use GuzzleHttp\RequestOptions;
use TarkovAPI\Config\Config;
use TarkovAPI\Structs\HTTP;
use TarkovAPI\Structs\TarkovResponse;
use TarkovAPI\Utils\HWID;

class TarkovMail extends TarkovClient
{
    const ENDPOINT_MAIL = 'https://%s/client/mail/dialog/list';
    const ENDPOINT_MAIL_VIEW = 'https://%s/client/mail/dialog/view';
    const ENDPOINT_ATTACHMENTS = 'https://%s/client/mail/dialog/getAllAttachments';
    const ENDPOINT_MOVE = 'https://%s/client/game/profile/items/moving';
    
    const MAIL_TYPE_MARKET = 4;
    const MAIL_TYPE_SYSTEM = 7;
    const MAIL_TYPE_NPC = 2;

    public function getMail(): TarkovResponse
    {
        $url = sprintf(
            self::ENDPOINT_MAIL,
            Config::PROD_ENDPOINT
        );

        return $this->requestGame(HTTP::POST, $url);
    }
    
    public function getMailFromMarket()
    {
        $mail = $this->getMail();
        
        foreach ($mail->getData() as $msg) {
            if ($msg->type === self::MAIL_TYPE_MARKET) {
                return $msg;
            }
        }
        
        return false;
    }
    
    public function getMailAttachments($dialogId)
    {
        $url = sprintf(
            self::ENDPOINT_ATTACHMENTS,
            Config::PROD_ENDPOINT
        );
    
        return $this->requestGame(HTTP::POST, $url, [
            RequestOptions::JSON => [
                'dialogId' => $dialogId
            ],
        ]);
    }
    
    public function getMoneyFromFleaMarket(string $stashId, string $attachmentId, string $itemId)
    {
        $url = sprintf(
            self::ENDPOINT_MOVE,
            Config::PROD_ENDPOINT
        );
        
        $body = [
            'data' => [
                [
                    'Action' => 'Move',
                    'item' => $itemId,
                    'to' => [
                        'id' => $stashId,
                        'container' => 'hideout',
                    ],
                    'fromOwner' => [
                        'id' => $attachmentId,
                        'type' => 'Mail'
                    ]
                ]
            ]
        ];
    
        return $this->requestGame(HTTP::POST, $url, [
            RequestOptions::JSON => $body,
        ]);
    }
}
