<?php

namespace TarkovAPI\Session;

class TarkovSession
{
    const FILENAME = __DIR__ .'/../../../data/session';
    
    private static $data;
    
    public static function init()
    {
        if (file_exists(self::FILENAME)) {
            self::$data = file_get_contents(self::FILENAME);
            self::$data = json_decode(self::$data, true);
        }
    }
    
    public static function retrieve(string $index)
    {
        return self::$data[$index] ?? null;
    }
    
    public static function has(string $index)
    {
        return !empty(self::$data[$index]);
    }
    
    public static function delete(string $index)
    {
        unset(self::$data[$index]);
        self::save();
    }
    
    public static function store(string $index, string $data)
    {
        self::$data[$index] = $data;
        self::save();
    }
    
    public static function save()
    {
        file_put_contents(self::FILENAME, json_encode(self::$data, JSON_PRETTY_PRINT));
    }
}
