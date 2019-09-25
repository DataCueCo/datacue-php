<?php

namespace DataCue\Core;

class Headers
{
    private static $content = [
        "Content-Type" => "application/json",
    ];

    public static function getHeaders()
    {
        return static::$content;
    }

    public static function setHeader($key, $value)
    {
        static::$content[$key] = $value;
    }

    public static function removeHeader($key)
    {
        unset(static::$content[$key]);
    }
}