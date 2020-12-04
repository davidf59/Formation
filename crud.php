<html>
 <head>
   <title>Hello World</title>
 </head>
 <body>
   <?php
   session_start();
   require("utils.php");
    $DB = new DB();

    if(isset($_POST['action']) && $_POST['action'] == "delete"){
        $DB->callDB("DELETE FROM " . $_GET["table"] . " where ID = " . $_POST['id']);
    }

   $servername = "localhost";
   $username = "root";
   $password = "";
   $dbname = "cours_php";

   $conn = new mysqli($servername,$username, $password, $dbname);

   $sql = "SELECT * FROM " . $_GET["table"];
   

   $result = $conn->query($sql);

   $tabResults = [];

   // echo print_r($tabResults);

    ?>
<a href="index.php"> Retour </a>

<h1>Table : <?php echo $_GET["table"]; 
  echo '<form method = "POST" action="/modif_table.php"> 
     <input type="hidden" name="ajout" value="insert">
     <input type="submit" value="Ajouter"/>
     <input type="hidden" name ="nomtable" value="'. $_GET['table'] . '"/>
  </form>'
  ?>
</h1>

<?php
if((isset($_POST["logout"]))&&($_POST["logout"]=="logout"))
  {
//  	unset($_SESSION['auth']);
  	    setcookie("auth","",time()-60,"/","",0);
  }
?>



<?php
  
    $tab1 = $DB->fetchDB($sql);
//    echo print_r($tab1);
    echo '<br><br>';
    foreach ($tab1 as $index => $propriete) {
          foreach ($propriete as $i_lig1 => $p_lig1) {
                   echo $i_lig1 . " : " . $p_lig1 . "  --------   ";
          }
          echo "<form method='POST'>
                  <input type='hidden' name='id' value='". $propriete['ID'] ."'>
                  <input type='hidden' name='action' value='delete'>
                  <input type='submit' value='SUPPRIMER'>
                </form>";
          echo "<form method='POST' action='/update_table.php?rid=".$propriete['ID'] ."''>
                  <input type='hidden' name='id' value='". $propriete['ID'] ."'>
                  <input type='hidden' name='nomtable' value='". $_GET['table'] ."'/>
                  <input type='hidden' name='action2' value='modify'>
                  <input type='submit' value='MODIFIER'>
                </form>";
          echo '<br>';
    }

  /*   while ($proprietes = mysqli_fetch_assoc($result)) {
    /// array_push($tabResults, $row);
    foreach ($proprietes as $index => $propriete) {
        echo $index . " : " . $propriete . "  --------   ";
    }
    echo "<form method='POST'>
    <input type='hidden' name='id' value='". $proprietes['id'] ."'>
    <input type='hidden' name='action' value='delete'>
    <input type='submit' value='SUPPRIMER'>
    </form>";
    echo "<br>";
 }
*/

?>
 </body>
</html>