<?php
require __DIR__."/../Database/DB.php";
 class Product extends DB{
  private $Name;
  private $Price; 
  private $Famille;
  private $Tva; 

  function create_product($Name,$Price,$Famille,$Tva) {
    $new = $this->callDB("INSERT INTO products (Name, Price, Famille, Tva) VALUES ('".$Name."',".$Price.",'".$Famille."','".$Tva."')");   
  }

  function get_product() {
    $sql = "SELECT * FROM products";
    $tab = $this->fetchDB($sql);
    return $tab;
  }

  function del_product($ID) {
    $sql = "DELETE FROM products WHERE ID = ".$ID;
    $result = $this->callDB($sql);
    return $result;
  }

  function desc_product() {
    $sql = "DESC products";
    $tab = $this->fetchDB($sql);
    return $tab;
  }
}