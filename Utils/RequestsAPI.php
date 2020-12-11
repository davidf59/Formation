<?php
namespace Utils;

use GuzzleHttp\Client;

class RequestsAPI {
  private static $guz_instance;
  private $guz;

  public static function getInstance(){
    if(is_null(self::$guz_instance)){
      self::$guz_instance = new RequestsAPI();
    }
    return self::$guz_instance;
  }

  private function __construct() {
    $this->guz = new Client([
      'timeout' => 2.0]);
  }

  function get_url($url) {
    $res = $this->guz->request('GET', $url);
    $tab = json_decode($res->getBody());
    return $tab;
  }
}





