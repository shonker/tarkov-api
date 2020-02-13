<?php

namespace TarkovAPI\Structs;

use TarkovAPI\API\TarkovClient;

class TarkovResponse
{
    /** @var int */
    private $error;
    /** @var string */
    private $errorMessage;
    /** @var \stdClass */
    private $data;

    public function __construct(string $responseJson)
    {
        // gzip un-compress the response
        $responseJson = gzuncompress($responseJson);

        // json decode the response
        $responseJson = json_decode($responseJson);

        $this->error = $responseJson->err;
        $this->errorMessage = $responseJson->errmsg;
        $this->data = $responseJson->data;
    }

    public function getError(): int
    {
        return $this->error;
    }

    public function getErrorMessage(): string
    {
        return $this->errorMessage;
    }

    public function getData()
    {
        return $this->data;
    }
}
