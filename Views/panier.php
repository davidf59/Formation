<?php $title = 'Hello world'; ?>

<?php ob_start(); ?>
   
<h1>Votre panier</h1>

<?php         
    foreach ($tabaff as $index => $propriete) {
        echo $propriete['name'];
        echo "<br/>";
    } 
$data = ob_get_clean();
require('template.php'); 