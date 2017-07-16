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

    public function isValid()
    {
        $vars = get_object_vars($this);
        $keys = array_keys($vars);

        foreach ($keys as $key) {
            $func = sprintf('valid%s', ucfirst($key));
            $this->$func();
        }

        return true;
    }

    public function validEmail()
    {
        UserValidators::validateEmail($this->email);
    }

    public function validPassword()
    {
        UserValidators::validatePassword($this->password);
    }
}
