<?php $title = 'Hello world'; ?>

<?php ob_start(); 
//<form name="login" action="/david/Formation/?action=login" method="POST">
?>
   
<h1>Page de connexion</h1>

<form name="login" action="<?php echo "/".basename(dirname(__FILE__,3))."/".basename(dirname(__FILE__,2));?>/?action=login" method="POST">
            <label for="email">E-mail</label>
            <input type="text" name="email">
            <br>
            <label for="password">Mot de passe</label>
            <input type="password" name="password">
            <br>
            <?php 
                $token = \Utils\Crsf_token::getInstance($t);
                $tab = $token->get_token();
            ?>
            <input type="hidden" name="token" value="<?= $tab ?>">
            <input type="submit" name="submit" value="Connexion">
</form>

<?php         
        foreach ($errors as $key => $error) {
            echo "<p style='color : red;'> ".$error ."</p>";
        }

$data = ob_get_clean();
require('template.php'); 