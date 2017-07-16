<?php

namespace Controllers\User;

use Controllers\Base;

class Detail extends Base
{
    const INDEX_UID = 1;

    public static function get()
    {
        $uid = self::getUid();
        echo $uid;
    }

    public static function getUid()
    {
        $uri = $_SERVER['REQUEST_URI'];
        $result = [];

        preg_match(sprintf('/^%s$/', addcslashes('/users/(\d{1,10})/', '/')), $uri, $result);
        $uid = $result[self::INDEX_UID];

        return (int) $uid;
    }
}
