<?php $title = 'Hello world'; ?>

<?php ob_start(); ?>
   
<h1>Table Products
<?php  
  echo '<form method = "POST"> 
     <input type="hidden" name="ajout" value="insert">
     <input type="submit" value="Ajouter"/>
     </form>';
?>
</h1>


<form method="POST">
    Name : <input name="Name"/><br>
    Price : <input name="Price"/><br>
    Famille : <input name="Famille"/><br>
    Tva : <input name="Tva"/><br><br>
    <input type='hidden' name='valid_ajout' value='ok_ajout'>
    <input type='submit' value='Enregistrer'>
</form>
<?php
/*    $tabfield=[];
    if((isset($_POST["ajout"]))&&($_POST["ajout"]=="insert")) {
        foreach ($tabdesc as $ind_desc => $pro_desc) {
            foreach ($pro_desc as $i_desc => $p_desc) {
                if ($p_desc != "ID" && $i_desc=='Field') {
                    echo $p_desc . " : ";
                    echo '<form method="POST"><input name="field['.$p_desc.']"/></form>'; 
                    echo '<br>';
                }
            }
        }
        echo "<form method='POST'>
          <input type='hidden' name='valid_ajout' value='ok_ajout'>
          <input type='submit' value='Enregistrer'>
          </form>";
    }*/
?>

<?php         
    echo print_r($tabaff);
    echo '<br><br>';
    foreach ($tabaff as $index => $propriete) {
          foreach ($propriete as $i_lig1 => $p_lig1) {
                   echo $i_lig1 . " : " . $p_lig1 . "  --------   ";
          } 
          echo "<form method='POST'>
            <input type='hidden' name='id' value='". $propriete['ID'] ."'>
            <input type='hidden' name='action' value='delete'>
            <input type='submit' value='SUPPRIMER'>
            </form>";
    }
$data = ob_get_clean();
require('template.php'); 