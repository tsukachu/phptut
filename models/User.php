<?php

namespace Models;

use Exception;

use Models\Base;
use Validators\UserValidators;

class User extends Base
{
    protected $email = null;
    protected $password = null;

    public function __construct($email, $password)
    {
        $this->email = $email;
        $this->password = $password;
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
