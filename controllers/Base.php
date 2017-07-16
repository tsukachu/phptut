<?php

namespace Controllers;

class Base
{
    public static function run()
    {
        $method = strtolower($_SERVER['REQUEST_METHOD']);
        static::$method();
    }
}
