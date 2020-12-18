<?php $title = 'Hello world'; ?>

<?php ob_start(); ?>
   
<h1>Panier
</h1>

<?php         
/*    echo print_r($tab_aff);
    $temp_panier = [];
    setcookie("panier","toto", time()+3600, "/", "", 0);*/
    echo $_COOKIE["panier"];

    echo '<form method="POST">
    	    <input type="hidden" name="mail" value ="mail">
    		<input type="submit" name="envoi" value="Acheter" />
  		  </form>';

$data = ob_get_clean();
require('template.php'); 