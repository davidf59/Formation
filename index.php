<?php
  require ("./vendor/autoload.php");

  $url = dirname(__FILE__);
  echo $url;
/*
  use Dompdf\Dompdf;
  $dompdf = new Dompdf();
  $dompdf->loadHtml('hello world');

  $dompdf->render();
  $output = $dompdf->output();
  file_put_contents('Public/PDF/'.time().'.pdf', $output);
*/
  spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
  });

  if (isset($_GET['action'])) {
    switch ($_GET['action']) {
      case 'login':
        \Controllers\Auth_Controller::login();
        break;
      case 'register':
        \Controllers\Auth_Controller::register();
        break;
      case 'products':
        \Controllers\Products_Controller::products();
        break;
      case 'planetes':
        \Controllers\Planetes_Controller::Planetes();
        break;
      default:
        \Controllers\Home::home();
        break;
    } 
  } else {
        \Controllers\Home::home();
      };


