<html>
 <head>
   <title>Hello World</title>
 </head>
 <body>
   <?php
//      session_start();
    print_r($_POST);

    function isLoginCorrect(){
    $errors = [];
    if(strlen($_POST['password'])<5){
        array_push($errors, "Le mot de passe doit faire plus de 4 caractères");
    }
    if(strlen($_POST['email'])<5){
        array_push($errors, "L'email doit faire plus de 4 caractères");
    }
    if(count($errors) > 0){
        return $errors;
    }
   
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "cours_php";

    $conn = new mysqli($servername,$username, $password, $dbname);

    $sql = "SELECT * FROM users WHERE email = '" . $_POST['email'] . "'";
    //$sql = "SHOW TABLES";
    $result = $conn->query($sql);
    echo "<br>";

    $row = mysqli_fetch_assoc($result);
    echo print_r($row);
    if(!isset($row['Email'])){
        array_push($errors, "L'email est inconnu !");
        return $errors;
    }

    if (password_verify($_POST['password'], $row['Password'])) {
        return $errors;
    } else {
        array_push($errors, "Le mot de passe est inconnu !");
        return $errors;
    }
   }

    $errors = [];
    print_r($_POST);
    if(isset($_POST["email"]) && isset($_POST["password"])){
        if(count(isLoginCorrect()) == 0){
           setcookie("auth","eyTd1vsd", time()+3600,"/","",0);
           header('location:index.php');

//            $_SESSION["auth"] = "eyTd1vsd"
            ;
        }else{
            $errors = isLoginCorrect();
        }
    }
    ?>

<h1>Page de connexion</h1>

<form name="login" action="/login.php" method="POST">
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
?>
 </body>
</html>