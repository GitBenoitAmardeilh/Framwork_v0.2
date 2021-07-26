<?php
/*
echo "<pre>";
var_dump($this->getDataForm());
echo "</pre>";
*/
require 'vendor/autoload.php';

use App\Log\Log;


$o = new Log();
//Require(__DIR__."\Autoload\Autoload.php");

/*
$autoload = new Autoload();
Autoload::$App["Route"]->assignControllerAndAction();

if(sizeOf(Autoload::$App["Errors"]->getErrorInfos()) == 0){

    Autoload::$App["Log"]->stop();
    Autoload::$App["Route"]->redirectToController();


} else {

    Autoload::$App["Errors"]->view();

}*/


