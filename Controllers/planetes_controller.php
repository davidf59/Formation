<?php   
namespace Controllers;

class Planetes_Controller 
{
  public static function Planetes() 
  {
    $tabaff = [];
  
    $ReqAPI = \Utils\RequestsAPI::getInstance();
    $url = 'http://swapi.dev/api/planets/';
    $tabaff = $ReqAPI->get_url($url);
    require __DIR__."/../Views/planetes.php";    
  }
}