<html>
 <head>
   <title>Hello World</title>
 </head>
 <body>
   <?php


//      session_start();

    print_r($_POST);
    include 'utils.php';

   function isLoginCorrect(){
    $errors = [];
    if(strlen($_POST['password'])<5){
        array_push($errors, "Le mot de passe doit faire plus de 4 caractères");
    }
    if(strlen($_POST['email'])<5){
        array_push($errors, "L'email doit faire plus de 4 caractères");
    }

    return $errors;
   }

    $errors = [];
    $DB=new DB();
    print_r($_POST);
    if(isset($_POST["email"]) && isset($_POST["password"])){
        if(count(isLoginCorrect()) == 0){
            echo $DB->callDB("INSERT INTO users (email, password) VALUES ('".$_POST['email'] ."', '".password_hash($_POST['password'], PASSWORD_BCRYPT) . "')");
            
            /*$test1 = "7777777777";
            $test = "test{$test1}sst";*/

           /*setcookie("auth","eyTd1vsd", time()+3600,"/","",0);
           header('location:index.php');*/

            ;
        }else{
            $errors = isLoginCorrect();
        }
    }
    ?>

<h1>Page de connexion</h1>

<form name="login" method="POST">
            <label for="email">E-mail</label>
            <input type="text" name="email">
            <br>
            <label for="password">Mot de passe</label>
            <input type="password" name="password">
            <br>
            <input type="submit" name="submit" value="Inscription">
</form>

<?php         
        foreach ($errors as $key => $error) {
            echo "<p style='color : red;'> ".$error ."</p>";
        }
?>
 </body>
</html>
