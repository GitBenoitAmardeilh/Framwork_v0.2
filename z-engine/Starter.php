<?php
/*
echo "<pre>";
var_dump($this->getDataForm());
echo "</pre>";
*/

Require(__DIR__."\Autoloads\Autoload.php");


$autoload = new Autoload();
Autoload::$App["Route"]->assignControllerAndAction();

if(sizeOf(Autoload::$App["Errors"]->getErrorInfos()) == 0){

    Autoload::$App["Log"]->stop();
    Autoload::$App["Route"]->redirectToController();


} else {

    Autoload::$App["Errors"]->view();

}
    

