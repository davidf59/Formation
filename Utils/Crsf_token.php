<?php
namespace Utils;

class Crsf_token {
  private static $token_instance;
  private $token;

  public static function getInstance(){
    if(is_null(self::$token_instance)){
      self::$token_instance = new Crsf_token();
    }
    return self::$token_instance;
  }

  private function __construct() {
    $_SESSION["token"]=rand(9999,999999);
//    $this->token=$_SESSION["tok",$t];
    $this->token=$_SESSION["token"];
    
  }

  public static function get_token() {
    $instance = Crsf_token::getInstance();
    return $instance->token;
  }

  public function verif_token() {
    return $this->token;
  }
}





