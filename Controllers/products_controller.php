<?php   
namespace Controllers;

class Products_Controller 
{
  public static function Products() 
  {
//    require_once(__DIR__."/../Models/products.php");
    $tabaff = [];
    $tabdesc = [];
    $product = new \Models\Products();   

  
    if(isset($_POST['action']) && $_POST['action'] == "delete"){
        echo '<br><br>';
        echo $_POST['id'];
        echo '<br><br>';
        $product->del_product($_POST['id']);
        $resdel=$product->del_product($_POST['id']);
        echo $resdel;
    }

    if(isset($_POST['ajout']) && $_POST['ajout'] == "insert"){
        $product->desc_product();
        $tabdesc=$product->desc_product();
    }

    if(isset($_POST["valid_ajout"]) && $_POST["valid_ajout"]=="ok_ajout"){
        print_r($product->create_product($_POST["Name"],$_POST["Price"],$_POST["Famille"],$_POST["Tva"],$_FILES["Ref_image"]['name']));
        echo print_r($_FILES["Ref_image"]);
        echo dirname(__FILE__,2)."/Public/IMG/".$_FILES["Ref_image"]['name'];
        move_uploaded_file($_FILES["Ref_image"]['tmp_name'], dirname(__FILE__,2)."/Public/IMG/".$_FILES["Ref_image"]['name']);
    }
    $tabaff=$product->get_product();  
    require __DIR__."/../Views/products.php";    
  }
}