<?php   

   function isLoginCorrect(){
  	    require(__DIR__."/../Models/users.php");
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
    $user = new User();   
    $user->get_user_by_email();
    $row=$user->get_user_by_email();
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

  function login() {

  	$errors = [];
    print_r($_POST);
    if(isset($_POST["email"]) && isset($_POST["password"])){
        if(count(isLoginCorrect()) == 0){
           setcookie("auth","eyTd1vsd", time()+3600,"/","",0);
           header('location:index.php');
//            $_SESSION["auth"] = "eyTd1vsd"
        }else{
            $errors = isLoginCorrect();
        }
    }
  	require __DIR__."/../Views/newlogin.php" ;
  }

  function register() {
    require_once(__DIR__."/../Models/users.php");
    print_r($_POST);
    $errors = [];
//    $Usert=new User();

    if(isset($_POST["email"]) && isset($_POST["password"])){
        print_r(User::create_user($_POST["email"], $_POST["password"]));
        setcookie("auth","eyTd1vsd", time()+3600,"/","",0);
        header('location:index.php');
    }

	 require __DIR__."/../Views/register.php";
  }


