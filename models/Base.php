<?php

namespace Models;

use Exception;

class Base
{
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
}
