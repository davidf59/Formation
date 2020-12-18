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

        if(isset($_POST['mail']) && $_POST['mail'] == "mail"){
            echo 'ok mail';
//  recuperer le mail de l'utilisateur ?
//            $mail = new \Models\Mail($row['email']);
            $maildest = 'davidformentel@gmail.com';
            $mail = new \Models\Mail($maildest);
            $body = $mail->sendmail('Objet','Corps');
        }


       require __DIR__."/../Views/panier.php";
    }
}
