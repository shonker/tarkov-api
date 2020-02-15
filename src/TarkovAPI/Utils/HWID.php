<?php

namespace TarkovAPI\Utils;

class HWID
{
    // where to save Hardware ID so we don't generate one each time
    const FILENAME = __DIR__ .'/../../../data/hwid';

    // da fuck is this?
    const HASH_PATTERN = '#1-%s:%s:%s-%s-%s-%s-%s-%s';

    // some reason the last hash is sub 8?
    const SUB_LENGTH = 8;

    /**
     * Generate a random EFT compatible Hardware ID
     */
    public function get(): string
    {
        if (!file_exists(self::FILENAME)) {
            $hwid = $this->generateHardwareID();
            file_put_contents(self::FILENAME, $hwid);
        }

        return trim(file_get_contents(self::FILENAME));
    }
    
    public function set(string $hwid)
    {
        file_put_contents(self::FILENAME, $hwid);
    }

    public function reset()
    {
        @unlink(self::FILENAME);
    }

    /**
     * @return string
     */
    private function generateHardwareID():string
    {
        return sprintf(
            HWID::HASH_PATTERN,
            $this->getFullMD5(),
            $this->getFullMD5(),
            $this->getFullMD5(),
            $this->getFullMD5(),
            $this->getFullMD5(),
            $this->getFullMD5(),
            $this->getFullMD5(),
            $this->getShortMD5()
        );
    }

    private function getShortMD5(): string
    {
        $hash = $this->getFullMD5();
        $hash = substr($hash, 0, strlen($hash) - HWID::SUB_LENGTH);
        return $hash;
    }

    private function getFullMD5(): string
    {
        return md5(random_bytes(16));
    }
}
