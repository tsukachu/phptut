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

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception(sprintf('"email": Enter a valid email address'));
        }
    }

    public static function validate_password($password)
    {
        if (strlen($password) < 8) {
            throw new Exception(sprintf('"password": This password must contain at least 8 characters'));
        }
    }
}
