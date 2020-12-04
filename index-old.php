<html>
 <head>
   <title>Hello World</title>
 </head>
 <body>
   <?php
   session_start();
   require("utils.php");

   $servername = "localhost";
   $username = "root";
   $password = "";
   $dbname = "cours_php";

   $conn = new mysqli($servername,$username, $password, $dbname);

   //$sql = "SELECT * FROM users WHERE email = '" . $_POST['email'] . "'";
   $sql = "SHOW TABLES";

   $result = $conn->query($sql);

   echo "<br>";

   $tabResults = [];
   while ($row = mysqli_fetch_assoc($result)) {
      /// array_push($tabResults, $row);
       echo '<a href="/crud.php?table='.$row['Tables_in_cours_php'].'">'.$row['Tables_in_cours_php'].'</a>';
   }

  // echo print_r($tabResults);

/*   $servername= "localhost";
   $username = "root";
   $password = "";

   $conn = mysqli_connect($servername,$username,$password);

   if (!$conn){
   	echo mysql_connect_error();
   }else{
   	 echo 'Succès!';
   }

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "cours_php";
    
    $conn = new mysqli($servername,$username, $password, $dbname);

    echo print_r($conn);

    if ($conn->connect_error){
      echo $conn->connect_error;
    }else{
      echo "Succès";
    }

    $sql="CREATE TABLE Products (
      id INT(6) AUTO_INCREMENT PRIMARY KEY,
      name VARCHAR(30) NOT NULL,
      price DECIMAL(7,2) NOT NULL
    )";*

    if($conn->query($sql)){
      echo 'succès pour la table';
    }else{
      echo 'échec';
    }

    $sql = "INSERT INTO Products (name, price)
    VALUES ('T-shirt', 3.12)"; 
    
    if($conn->query($sql)){
      echo 'succès pour la requête';
    }else{
      echo 'échec';
    }*/


    ?>

<h1>Bienvenue sur l'accueil</h1>

<?php
if((isset($_POST["logout"]))&&($_POST["logout"]=="logout"))
  {
//  	unset($_SESSION['auth']);
  	    setcookie("auth","",time()-60,"/","",0);
  }
?>
<?php
//if (isset($_SESSION["auth"])):
if (verifrights()):
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
    <a href="crea_table.php">Création de table(s)</a>
</p>

</article>
<?php else: ?>

<a href="login.php">Ce contenu nécessite d'être connecté.</a>

<?php endif; ?>
 </body>
</html>