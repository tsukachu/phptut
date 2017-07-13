<?php

namespace Validators;

use Exception;

class UserValidators
{
    public static function validate_email($email)
    {
        if (!(0 < strlen($email) and strlen($email) <= 254)) {
            throw new Exception(sprintf('"email": Enter a valid number of characters'));
        }
    }
}
