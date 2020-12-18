<?php
namespace Controllers;

class Auth_Controller
{
    public static function isLoginCorrect()
    {
        $errors = [];
        if (strlen($_POST['password'])<5) {
            array_push($errors, "Le mot de passe doit faire plus de 4 caractères");
        }
        if (strlen($_POST['email'])<5) {
            array_push($errors, "L'email doit faire plus de 4 caractères");
        }
        if (count($errors) > 0) {
            return $errors;
        }
        $user = new \Models\User();
        $row=$user->get_user_by_email();
        echo print_r($row);
        if (!isset($row['Email'])) {
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

    public static function login()
    {
        $errors = [];
        print_r($_POST);
        if (isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["token"])) {
            if (count(self::isLoginCorrect()) == 0) {
                setcookie("auth", $_POST["token"], time()+3600, "/", "", 0);

//  Recuperer ici le mail 

                header('location:index.php');
//            $_SESSION["auth"] = "eyTd1vsd"
            } else {
                $errors = self::isLoginCorrect();
            }
        }
        require __DIR__."/../Views/newlogin.php" ;
    }

    public static function register()
    {
        print_r($_POST);
        $errors = [];
//    $Usert=new User();
        return;
        if (isset($_POST["email"]) && isset($_POST["password"])) {
            print_r(User::create_user($_POST["email"], $_POST["password"]));
            setcookie("auth", "eyTd1vsd", time()+3600, "/", "", 0);
            header('location:index.php');
        }

        require __DIR__."/../Views/register.php";
    }
}
