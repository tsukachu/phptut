<?php

use PHPUnit\Framework\TestCase;
use GuzzleHttp\Client;

use Controllers\User\Detail;

class UsersTest extends TestCase
{
    public function setUp()
    {
        $this->client = new Client(['base_url'=> 'http://127.0.0.1:8000/']);
    }

    public function testGetUserDetail()
    {
        $response = $this->client->get('/users/1/');

        $this->assertEquals($response->getStatusCode(), '200');
        $this->assertEquals($response->getBody(), '1');
    }

    public function testGetUid()
    {
        $uri = '/users/1/';
        $uid = Detail::getUid($uri);

        $this->assertSame($uid, 1);
    }
}
