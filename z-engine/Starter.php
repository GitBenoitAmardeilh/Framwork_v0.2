<?php
/*
echo "<pre>";
var_dump($this->getDataForm());
echo "</pre>";
*/

Require(__DIR__."\Autoloads\Autoload.php");

$autoload = new Autoload();
Autoload::$App["Route"]->checkControllerAndAction();

if(sizeOf(Autoload::$App["Err"]->getErrorInfos()) <> 0){

    Autoload::$App["Err"]->view();

} else {

    Autoload::$App["Route"]->redirectToController();

}
    

