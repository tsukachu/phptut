<?php

namespace Controllers;

class Index
{
    public static function run()
    {
        $method = strtolower($_SERVER['REQUEST_METHOD']);
        self::$method();
    }

    public static function get()
    {
        echo 'hello,world';
    }
}
