<?php

use PHPUnit\Framework\TestCase;
use GuzzleHttp\Client;

class IndexTest extends TestCase
{
    public function setUp()
    {
        $this->client = new Client(['base_url'=> 'http://127.0.0.1:8000/']);
    }

    public function testGetIndex()
    {
        $response = $this->client->get('/');

        $this->assertEquals($response->getStatusCode(), '200');
    }
}
