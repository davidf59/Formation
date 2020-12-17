<?php
namespace Models;

//require __DIR__."/../Database/DB.php";
 class Panier {
  private $ID_produit;
  private $Quantite; 


  function __construct(){

  } 

  public static function create_panier($ID_produit,$Quantite) {
/*    $product = new Products();
    $new = $product->callDB("INSERT INTO products (Name, Price, Famille, Tva) VALUES ('".$Name."',".$Price.",'".$Famille."','".$Tva."')");  */
    $DB = \Database\DB::getInstance();
//    $product = new Products();
    $sql = "INSERT INTO products (Name, Price, Famille, Tva, Ref_image) VALUES ('".$Name."',".$Price.",'".$Famille."','".$Tva."','".$Ref_image."')";
    $new = $DB->callDB($sql);   
    echo $new;
  }

  function get_product_by_ID($ID) {
    $DB = \Database\DB::getInstance();
    $sql = "SELECT * FROM products WHERE ID=".$ID;
    $tab = $DB->fetchDB($sql);
    return $tab;
  }
}