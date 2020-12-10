<?php   
namespace Controllers;

class Planetes_Controller 
{
  public static function Planetes() 
  {
//    require_once(__DIR__."/../Models/products.php");
    $tabaff = [];
    $tabdesc = [];
    $planete = new \Models\Planetes();   

  
    if(isset($_POST['ajout']) && $_POST['ajout'] == "insert"){
        $product->desc_product();
        $tabdesc=$product->desc_product();
    }

    if(isset($_POST["valid_ajout"]) && $_POST["valid_ajout"]=="ok_ajout"){
        print_r($product->create_product($_POST["Name"],$_POST["Price"],$_POST["Famille"],$_POST["Tva"]));
    }
    $tabaff=$product->get_product();  
    require __DIR__."/../Views/planetes.php";    
  }
}