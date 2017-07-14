<?php

namespace Models;

use Exception;

use Validators\UserValidators;

class User
{
    private $email = null;
    private $password = null;

    public function __construct($email, $password)
    {
        $this->email = $email;
        $this->password = $password;
    }

    public function __get($name)
    {
        $vars = get_object_vars($this);

        if (array_key_exists($name, $vars)) {
            return $vars[$name];
        } else {
            throw new Exception(sprintf('%s object has no attribute "%s"', get_class($this), $name));
        }
    }

    public function is_valid()
    {
        $vars = get_object_vars($this);
        $keys = array_keys($vars);

        foreach ($keys as $key) {
            $func = "valid_$key";
            $this->$func();
        }

        return true;
    }

    public function valid_email()
    {
        UserValidators::validate_email($this->email);
    }

    public function valid_password()
    {
        UserValidators::validate_password($this->password);
    }
}
