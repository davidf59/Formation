<?php
namespace Controllers;

class Home {
  public static	function home() {
  	require __DIR__."/../Utils/rights.php";
  	$droits = verifrights();

    $tabaff = [];
    $tabpanier = [];
    $upload_dir = dirname(__FILE__,2)."/Public/IMG/";


    $product = new \Models\Products();   

    $tabaff=$product->get_product();  

    if(isset($_POST["ID_produit"])){ 
    	echo 'Article ajouté au panier';
      array_push($tabpanier, $_POST["ID_produit"]) ;
      echo print_r($tabpanier);
    }	

    require __DIR__."/../Views/home.php";   


  }
}
