<?php $title = 'Hello world'; ?>

<?php ob_start(); ?>
   
<h1>Panier
</h1>

<?php         
    echo $_POST["ajout_panier"];

//    echo print_r($tab_aff);



    $temp_panier = [];
    setcookie("panier","toto", time()+3600, "/", "", 0);
    echo $_COOKIE["panier"];

$data = ob_get_clean();
require('template.php'); 