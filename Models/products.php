<?php
namespace Models;

//require __DIR__."/../Database/DB.php";
 class Products {
  private $Name;
  private $Price; 
  private $Famille;
  private $Tva;
  private $Ref_image;

  function __construct(){

  } 

  public static function create_product($Name,$Price,$Famille,$Tva,$Ref_image) {
/*    $product = new Products();
    $new = $product->callDB("INSERT INTO products (Name, Price, Famille, Tva) VALUES ('".$Name."',".$Price.",'".$Famille."','".$Tva."')");  */
    $DB = \Database\DB::getInstance();
//    $product = new Products();
    $sql = "INSERT INTO products (Name, Price, Famille, Tva, Ref_image) VALUES ('".$Name."',".$Price.",'".$Famille."','".$Tva."','".$Ref_image."')";
    $new = $DB->callDB($sql);   
    echo $new;
  }

  function get_product() {
    $DB = \Database\DB::getInstance();
    $sql = "SELECT * FROM products";
    $tab = $DB->fetchDB($sql);
    return $tab;
  }

  function get_product_by_ID($ID) {
    $DB = \Database\DB::getInstance();
    $sql = "SELECT * FROM products WHERE ID=".$ID;
    $tab = $DB->fetchDB($sql);
    return $tab;
  }

  function get_product_by_IDS($IDS) {
    $DB = \Database\DB::getInstance();
    $sql = "SELECT * FROM products WHERE ID IN ".$IDS;
    $tab = $DB->fetchDB($sql);
    return $tab;
  }

  function del_product($ID) {
    $DB = \Database\DB::getInstance();
    $sql = "DELETE FROM products WHERE ID = ".$ID;
    $result = $DB->callDB($sql);
    return $result;
  }

  function desc_product() {
    $DB = \Database\DB::getInstance();
    $sql = "DESC products";
    $tab = $DB->fetchDB($sql);
    return $tab;
  }
}