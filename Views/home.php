<?php $title = 'Hello world'; ?>

<?php ob_start(); ?>

<h1>L'accueil est ici</h1>

<?php

/*
  $client = new GuzzleHttp\Client();
  $res = $client->request('GET', 'http://swapi.dev/api/planets/');
  $tab = json_decode($res->getBody());
//  echo print_r($tab->results);
  foreach ($tab->results as $col => $obj) {
    echo $obj->name;
  } */

?>

<?php
/*  $client = new GuzzleHttp\Client();
  $r = $client->request('POST', 'https://jsonplaceholder.typicode.com/posts', [
    'form_params' => ['title' => 'foo',
                      'body' => 'bar',
                      'userId' => 1
                     ]
    ]);
  $tab = json_decode($r->getBody());
  echo print_r($tab);
  

  $client = new GuzzleHttp\Client();
  $r = $client->request('GET', 'https://jsonplaceholder.typicode.com/posts/1');
  echo print_r(json_decode($r->getBody()));*/


?>

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
    <?php 
      foreach ($tabaff as $index => $propriete) {
        echo $propriete['ID'];
        echo '<form method="POST">
                <img src="Public/IMG/'.$propriete['ref_image'].'" alt="image"/>
                <input type="hidden" name="ID_produit" value ="'.$propriete['ID'].'">
                <input type="submit" name="ajout_panier" value="Ajouter au panier"/>
              </form>';
      }
    ?>
<a href="./?action=panier">Afficher le panier</a>
</p>

</article></br></br></br>
    <a href="./?action=products">Table Products</a>
    <a href="./?action=planetes">Planetes</a>
</p>

</article>

<?php else: ?>
<a href="./?action=login">Ce contenu nécessite d'être connecté.</a>
<a href="./?action=register">Nouvelle inscription.</a>

<?php endif; ?>
<?php $data = ob_get_clean(); ?>

<?php require('template.php'); ?>