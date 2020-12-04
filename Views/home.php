<?php $title = 'Hello world'; ?>

<?php ob_start(); ?>
<h1>Salut tout le monde !!</h1>
<?php
if((isset($_POST["logout"]))&&($_POST["logout"]=="logout"))
  {
        setcookie("auth","",time()-60,"/","",0);
  }
?>
<?php
if ($droits):
?> 
<header>
  <form method="POST">
    <input type="hidden" name="logout" value ="logout">
    <input type="submit" name="Deco" value="Deconnexion" />
  </form>
</header>
<article>
<h2>
    titre
</h2>
<p>
    <a href="./?action=products">Table Products</a>
</p>

</article>

<?php else: ?>
<a href="./?action=login">Ce contenu nécessite d'être connecté.</a>
<a href="./?action=register">Nouvelle inscription.</a>

<?php endif; ?>
<?php $data = ob_get_clean(); ?>

<?php require('template.php'); ?>