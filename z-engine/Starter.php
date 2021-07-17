<?php
/*
echo "<pre>";
var_dump($this->getDataForm());
echo "</pre>";
*/

Require(__DIR__."\Autoloads\Autoload.php");

$autoload = new Autoload();

//$connexion = new DatabaseConnexion();

if(Autoload::$App["Database"]->getIsConnect() == true){

    $route = new Route();
    require (dirname(__DIR__)."\\routes\Web.php");
    $route->agent();

}
    

