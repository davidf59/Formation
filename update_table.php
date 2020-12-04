<!DOCTYPE html>
<html>
<head>
	<title>Hello World</title>
</head>
<body>
  <?php
    require("utils.php");
//    echo 'Table : '.$_POST['nomtable'].' ID : '.$_GET['rid'];
    $DB = new DB();  
    if(isset($_POST["val2"])){
      foreach ($_POST['val2'] as $index => $field) {
        if ($field != '') {
          if ($index == 'Password') {
            $update = "UPDATE ".$_POST['nomtable']." SET ".$index."='".password_hash($field, PASSWORD_BCRYPT)."' WHERE ID = ".$_GET["rid"];
          } else {
            $update = "UPDATE ".$_POST['nomtable']." SET ".$index."='".$field."' WHERE ID = ".$_GET["rid"];
            }
//          echo $update;
          $DB->callDB($update);
        }
      }    
    }
    echo '<a href="/crud.php?table='.$_POST['nomtable'].'"> Retour </a>';
  ?>

  <h1>Modification d'un enregistrement dans la table 
    <?php 
      echo $_POST["nomtable"]; 
    ?>
  </h1>

  <form method="POST">
    <input name="nomtable" type="hidden" value="<?php echo $_POST["nomtable"]?>"/>
    <input name="refid" type="hidden" value="<?php echo $_GET["rid"]?>"/>
    <?php 
      $sel = "SELECT * FROM " . $_POST["nomtable"] . " WHERE ID = " . $_GET["rid"];
      $tab_sel = $DB->fetchDB($sel);
      foreach ($tab_sel as $indsel => $ligne) {
        foreach ($ligne as $lib_champ => $val_champ) {
          if ($lib_champ != "ID") {
            echo $lib_champ." : ".$val_champ."  ";
            echo '<input name="val2['.$lib_champ.']"/>';
            echo "<br><br>";
          }
        }
      }
    ?>
    <input type = "submit"/>
  </form>
</body>
</html>
