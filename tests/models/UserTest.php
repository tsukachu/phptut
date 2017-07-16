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

    /**
     * @expectedException Exception
     * @expectedExceptionMessage "email": Enter a valid number of characters
     */
    public function testValidEmailTooShort()
    {
        $user = new User('', '');
        $user->validEmail();
    }

    /**
     * @expectedException Exception
     * @expectedExceptionMessage "email": Enter a valid number of characters
     */
    public function testValidEmailTooLong()
    {
        $user = new User(str_repeat('A', 255), '');
        $user->validEmail();
    }

    /**
     * @expectedException Exception
     * @expectedExceptionMessage "email": Enter a valid email address
     */
    public function testValidEmailIsInvalid()
    {
        $user = new User('foobar', '');
        $user->validEmail();
    }

    /**
     * @expectedException Exception
     * @expectedExceptionMessage "password": This password must contain at least 8 characters
     */
    public function testValidPasswordTooShort()
    {
        $user = new User('', '');
        $user->validPassword();
    }

    /**
     * @expectedException Exception
     */
    public function testValidAllRaiseException()
    {
        $user = new User('', '');
        $user->isValid();
    }

    public function testValidAllReturnTrue()
    {
        $this->assertTrue($this->user->isValid());
    }
}
