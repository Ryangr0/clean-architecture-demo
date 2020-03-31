<?php

namespace CleanArchitecture\Tests\Integration\Presentation;

use GuzzleHttp\Client;
use PHPUnit\Framework\TestCase;

class IndexTest extends TestCase
{
    public function test_index_works()
    {
        $client = new Client(['base_uri' => 'http://localhost']);

        $this->assertEquals(
            json_encode(['title' => 'My New Simple API', 'version' => 1]),
            $client->get('/')->getBody()->getContents()
        );
    }
}
