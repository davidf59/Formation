<?php $title = 'Hello world'; ?>

<?php ob_start(); ?>
   
<h1>Page de connexion</h1>

<form name="login" action="/david/Formation/?action=login" method="POST">
            <label for="email">E-mail</label>
            <input type="text" name="email">
            <br>
            <label for="password">Mot de passe</label>
            <input type="password" name="password">
            <br>
            <input type="submit" name="submit" value="Connexion">
</form>

<?php         
        foreach ($errors as $key => $error) {
            echo "<p style='color : red;'> ".$error ."</p>";
        }

$data = ob_get_clean();
require('template.php'); 