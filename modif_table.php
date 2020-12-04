<!DOCTYPE html>
<html>
<head>
	<title>Hello World</title>
</head>
<body>
<?php
  require("utils.php");
	$DB = new DB();
	$desc = "DESC " . $_POST["nomtable"];
	echo print_r($_POST);

  if(isset($_POST["field"])){
    $fields = "";
    $values = "";
    foreach ($_POST["field"] as $index => $field) {
      $fields = strlen($fields) == 0 ? $fields  .$index :  $fields . "," .$index;
      $values = strlen($values) == 0 ? $values . "'" .$field . "'" :  $values . "," . "'" .$field . "'";
    }
    echo "<br>";
    echo "<br>";
    echo "INSERT INTO " . $_POST["nomtable"] . " (" . $fields ." ) VALUES (" . $values. ");";
    echo "<br>";
    echo "<br>";
    echo $fields;
    echo "<br>";
    echo $values;
    echo "<br>";
    echo $DB->callDB("INSERT INTO " . $_POST["nomtable"] . " (" . $fields ." ) VALUES (" . $values. ")");

  }
 
?>

<h1>Ajout d'un enregistrement dans la table <?php echo $_POST["nomtable"]; ?></h1>
<form method="POST">
	<input name="nomtable" type="hidden" value="<?php echo $_POST['nomtable']?>"/>
<?php 
  $tab_desc = $DB->fetchDB($desc);
  foreach ($tab_desc as $ind_desc => $pro_desc) {
      foreach ($pro_desc as $i_desc => $p_desc) {
          if ($p_desc != "ID" && $i_desc=='Field') {
            echo $p_desc . " : ";
            echo '<input name="field['.$p_desc.']"/>'; 
            echo '<br>';
          }
    }
  }
?>
<input type="submit" />
</form>
</body>
</html>