<?php
  require("./Controllers/auth_controller.php");
  require("./Controllers/products_controller.php");
  require ("./vendor/autoload.php");

  use Dompdf\Dompdf;
  $dompdf = new Dompdf();
  $dompdf->loadHtml('hello world');

  $dompdf->render();
  $output = $dompdf->output();
  file_put_contents('Brochure.pdf', $output);

  spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
  });

  if (isset($_GET['action'])) {
    switch ($_GET['action']) {
      case 'login':
        login();
        break;
      case 'register':
        register();
        break;
      case 'products':
        products();
        break;
      default:
        \Controllers\Home::home();
        break;
    } 
  } else {
        \Controllers\Home::home();
      };


