<?php
namespace Models;

 class User{
  private $Email;
  private $Password; 
  private $Nom;
  private $Prenom; 
  private $Adresse;
  private $Telephone;

  function __construct(){
    
  }

  public static function create_user($Email,$Password) {
    $user = new User();
    $new = $user->callDB("INSERT INTO users (email, password) VALUES ('".$Email ."', '".password_hash($Password, PASSWORD_BCRYPT) . "')");   

    return true;
  }

  function get_user_by_email() {
    $DB = \Database\DB::getInstance();
    echo var_dump($DB);
    $sql = "SELECT * FROM users WHERE email = '" . $_POST['email'] . "'";
    $row = $DB->singlerowDB($sql);
    return $row;
  }
}