<?php

use PHPUnit\Framework\TestCase;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

class NotFoundTest extends TestCase
{
    public function setUp()
    {
        $this->client = new Client(['base_url'=> 'http://127.0.0.1:8000/']);
    }

    public function testGetNotFound()
    {
        try {
            $this->client->get('/notfound/');
        } catch (ClientException $e) {
            $response = $e->getResponse();

            $this->assertEquals($response->getStatusCode(), '404');
        }
    }
}
