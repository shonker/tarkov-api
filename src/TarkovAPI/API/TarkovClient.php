<?php

namespace TarkovAPI\API;

use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
use Psr\Http\Message\ResponseInterface;
use TarkovAPI\Config\Config;
use TarkovAPI\Structs\TarkovResponse;
use TarkovAPI\Utils\Logger;

class TarkovClient
{
    // error codes
    const ERROR_CODES = [
        201 => 'Not Authorized',
        207 => 'Missing Parameters',
        209 => 'Two Factor Required',
        211 => 'Bad Two Factor Code',
        214 => 'Captcha Required'
    ];

    // client timeout
    const CLIENT_TIMEOUT = 5.0;

    // default headers for a request
    const CLIENT_HEADERS = [
        'Content-Type'  => 'application/json',
        'User-Agent'    => 'BSG Launcher '. Config::LAUNCHER_VERSION,
        'Host'          => Config::LAUNCHER_ENDPOINT
    ];
    
    const GAME_HEADERS = [
        'User-Agent' => 'UnityPlayer/'. Config::UNITY_VERSION .' (UnityWebRequest/1.0, libcurl/7.52.0-DEV)',
        'App-Version' => 'EFT Client '. Config::GAME_VERSION,
        'X-Unity-Version' => Config::UNITY_VERSION,
        'Cookie' => 'PHPSESSID=%s'
    ];

    /** @var Logger */
    private $logger;
    /** @var Client */
    private $client;

    public function __construct()
    {
        // init logger
        $this->logger = new Logger(__CLASS__);

        // init guzzle client
        $this->client = new Client([
            RequestOptions::TIMEOUT => self::CLIENT_TIMEOUT,
            RequestOptions::HEADERS => self::CLIENT_HEADERS
        ]);
    }

    /**
     * Send an API Request
     */
    protected function request(string $method, string $uri, ?array $options = []): TarkovResponse
    {
        $this->logger->log->info("Request: {$uri}");

        return $this->response($this->client->request(
            $method,
            $uri,
            $options
        ));
    }

    /**
     * handle Tarkov API responses
     */
    protected function response(ResponseInterface $response)
    {
        return new TarkovResponse($response->getBody()->getContents());
    }
}
