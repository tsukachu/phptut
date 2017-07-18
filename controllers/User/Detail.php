<?php

namespace Controllers\User;

use Controllers\Base;

class Detail extends Base
{
    public static function get()
    {
        $uid = self::getUid($_SERVER['REQUEST_URI']);
        echo $uid;
    }

    public static function getUid($uri)
    {
        $uid = basename($uri);

        return (int) $uid;
    }
}
