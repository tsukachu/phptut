<?php

use PHPUnit\Framework\TestCase;
use GuzzleHttp\Client;

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
}
