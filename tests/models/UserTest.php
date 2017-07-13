<?php

use PHPUnit\Framework\TestCase;

use Models\User;

class UserTest extends TestCase
{
    public function setUp()
    {
        $this->user = new User('foo@bar.com', 'testpassword');
    }

    public function testIsClassExists()
    {
        $this->assertTrue(class_exists('Models\User'));
    }

    public function testCreateUser()
    {
        $user = new User('foo@bar.com', 'testpassword');
        $this->assertTrue((bool) $user);
    }

    public function testCreateUserHasAttribute()
    {
        $this->assertObjectHasAttribute('email', $this->user);
        $this->assertObjectHasAttribute('password', $this->user);

        $this->assertEquals($this->user->email, 'foo@bar.com');
        $this->assertEquals($this->user->password, 'testpassword');
    }

    /**
     * @expectedException Exception
     * @expectedExceptionMessage Models\User object has no attribute "undefined"
     */
    public function testThrowExeception()
    {
        $this->user->undefined;
    }
}
