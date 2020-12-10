<?php
namespace Controllers;

class Home {
  public static	function home() {
  	require __DIR__."/../Utils/rights.php";
  	$droits = verifrights();
  	require __DIR__."/../Views/home.php" ;
	}
}
