<?php
namespace Controllers;

class Home {
  public static	function home() {
  	require __DIR__."/../Utils/rights.php";
  	$droits = verifrights();

    $tabaff = [];
    $tabpanier = isset($_COOKIE["panier"]) ? json_decode($_COOKIE["panier"]) : [];
    $upload_dir = dirname(__FILE__,2)."/Public/IMG/";

      print_r(json_decode($_COOKIE["panier"]));

    $product = new \Models\Products();   

    $tabaff=$product->get_product();  

    if(isset($_POST["ID_produit"])){ 
    	echo 'Article ajouté au panier';
      array_push($tabpanier, $_POST["ID_produit"]);
      $tabpanier = array_unique($tabpanier);
      echo print_r($tabpanier);
      setcookie("panier", json_encode($tabpanier), time()+3600, "/", "", 0);
    }	

    require __DIR__."/../Views/home.php";   


  }
}
