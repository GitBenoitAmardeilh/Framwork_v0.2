<?php
/*
echo "<pre>";
var_dump($this->getDataForm());
echo "</pre>";
*/

Require(__DIR__."\Autoloads\Autoload.php");
Require(__DIR__."\Log\Logger.php");

Logger::start();
$autoload = new Autoload();
Autoload::$App["Route"]->assignControllerAndAction();

if(sizeOf(Autoload::$App["Errors"]->getErrorInfos()) <> 0){

    Logger::stop();
    Autoload::$App["Errors"]->view();

} else {

    //Autoload::$App["Errors"]->deleteXmlFile();
    Autoload::$App["Route"]->redirectToController();

}
    

