<?php
namespace Utils;

class Crsf_token {
  private static $token_instance;
  private $token;

  public static function getInstance($t){
    if(is_null(self::$token_instance)){
      self::$token_instance = new Crsf_token($t);
    }
    return self::$token_instance;
  }

  private function __construct($t) {
    $t = 'test';
    $this->token=$t;
//    $p = new OAuthProvider();
/*    $t = $token->generatetoken(8);
    echo bin2hex($t);
    session_start();*/
  }

  public static function get_token() {
    return $this->token;
  }
}





