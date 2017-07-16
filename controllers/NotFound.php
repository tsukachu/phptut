<?php

namespace Controllers;

use Controllers\Base;

class NotFound extends Base
{
    public static function get()
    {
        http_response_code(404);
        echo 'NotFound';
    }
}
