<?php

use PHPUnit\Framework\TestCase;

use Models\User;

class UserTest extends TestCase
{
    public function testIsClassExists()
    {
        $this->assertTrue(class_exists('Models\User'));
    }
}
