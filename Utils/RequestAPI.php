<?php
namespace Utils;

use \GuzzleHttp\Client;

class RequestAPI
{
    private static $client;
    private $guzzle;

    public static function getInstance()
    {
        if (is_null(self::$client)) {
            self::$client = new RequestAPI();
        }
        return self::$client;
    }
    
    private function __construct()
    {
        $this->guzzle = new Client([
            'headers' => ['Content-Type' => 'application/json'],
            'timeout'           => 30.0,
            'allow_redirects'   => true,
            'verify'            => false,
        ]);
    }

    public static function getRequest($url)
    {
        $client = self::getInstance();
        $response = $client->guzzle->get(
            $url
        );
        return json_decode($response->getBody(), true);
    }
}
