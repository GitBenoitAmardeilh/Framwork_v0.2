<?php

require(__DIR__.'/z-engine/Starter.php');

$errors = new Errors();

if($errors->getInError() == false){

    $route = new Route();
    $route->launch();
    
}

//$database = Autoload::load("Database");

