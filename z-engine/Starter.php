<?php

Require(__DIR__."\autoloads\Autoload.php");

Autoload::addRequireFilesInProject();

$bd = new DatabaseConnexion();

if($bd->getIsConnect() == false){

    echo Errors::view();
    
} else {

    $route = new Route();
    $route->launch();
    
}

