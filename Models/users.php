<?php
require __DIR__."/../Database/DB.php";
 class User extends DB{
  private $Email;
  private $Password; 
  private $Nom;
  private $Prenom; 
  private $Adresse;
  private $Telephone;

  public static function create_user($Email,$Password) {
    $user = new User();
    $new = $user->callDB("INSERT INTO users (email, password) VALUES ('".$Email ."', '".password_hash($Password, PASSWORD_BCRYPT) . "')");   

    return true;
  }

  function get_user_by_email() {
//    require __DIR__."/../Database/DB.php";    
    $DB = new DB();

    $sql = "SELECT * FROM users WHERE email = '" . $_POST['email'] . "'";
    $row = $this->singlerowDB($sql);
    return $row;
  }
}