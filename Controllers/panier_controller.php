<?php
namespace Controllers;

class Panier_Controller
{
    public static function Panier()
    {
       $tabaff = [];
        $product = new \Models\Products();


        if (isset($_COOKIE['panier'])) {
            $tab = \json_decode($_COOKIE['panier']);

            $string = "(";
            foreach ($tab as $key => $value) {
                $string = $string . $value . ",";
            }
            $string = substr($string, 0, -1) . ")";
        } else {
            echo "Votre panier est vide !!!!!!";
            return;
        }
        echo $string;
        $tabaff=$product->get_product_by_IDS($string);
        print_r($tabaff);
       require __DIR__."/../Views/panier.php";
    }
}
