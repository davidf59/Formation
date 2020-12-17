<?php
namespace Controllers;

class Panier {
  public static	function panier() {

    $tabaff = [];
    $product = new \Models\Products();   

    $tabaff=$product->get_product_by_ID($_GET['ID']);  
    require __DIR__."/../Views/panier.php";    
  }
}
