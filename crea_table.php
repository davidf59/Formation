<html>
  <head>
    <title>Hello World</title>
  </head>
  <body>
    <?php
    session_start();
    include "utils.php";

    echo print_r($_POST);
    if (isset($_POST["field"])){

    $request = "CREATE TABLE " . $_GET["nomtable"] . " (id INT(6) AUTO_INCREMENT PRIMARY KEY,";

    foreach ($_POST["field"] as $key => $field) {
      $request = $request . $field . " " . $_POST["type"][$key] . "(" . $_POST["size"][$key] . "),";
      echo "<br>";
      echo $field;
      echo "<br>";
      echo $key;
      echo "<br>";
      echo $_POST["type"][$key];
      echo "<br>";
    }

    $request = substr($request, 0, -1);
    $request = $request . ")";
    echo $request;
    $test = callDB($request);
    echo print_r($test);
    }
    ?>

 

    <h1>Création de table</h1>
    <form method="GET">
      Table <input name="nomtable" />
      Number <input name="number" />
      <input type="submit" />
    </form>
 
    <form method="POST">
      <?php
        $options = '<option value="VARCHAR">Varchar</option>
                    <option value="INT">Int</option>
                    </select>';
        for ($i=0; $i < $_GET["number"]; $i++) {
          echo "<input name='field[".$i."]' />";
          echo '<select name=type[' . $i .']>' . $options;
          echo "<input name='size[".$i."]' />";
          echo "<br>";
        }
      ?>
      <input type="submit" />
    </form>
  </body>
</html>