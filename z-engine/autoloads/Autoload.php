<?php

class Autoload{

    /**
     * @var array
     * Contient les objets $App[ "Errors" , "Database" ]
     */
    public static $App = [];

    /**
     * Autoload constructor.
     */
    public function __CONSTRUCT()
    {
            $this->addRequireFilesInProject();
    }

    /**
     * Add all requires in project
     * @return void
     */
    public function addRequireFilesInProject()
    {
        $_autoload_file  = Require("z-engine\autoloads\Autoload_Class.php");

        foreach( $_autoload_file as $key => $path){

            $_arrLink = explode("\\",$path);
            $_file = substr($_arrLink[sizeOf($_arrLink)- 1], 0 ,-4);

            switch( $_file ){

                case "Errors":
                    //Require(dirname(__DIR__) . "\Xml\XmlManager.php");
                    Require(dirname(__DIR__)."\Exceptions\ExceptionManager.php");
                    Require(dirname(__DIR__)."\Exceptions\AppExceptions.php");
                    Require($path);
                    self::$App[$_file] = new $_file();
                    Autoload::$App["Log"]->write("Loading Object ".$_file."() -- ", $path);
                    break;

                case "Controller":
                    Require($path);
                    self::$App[$_file] = new $_file();
                    Autoload::$App["Log"]->write("Loading Object ".$_file."() -- ", $path);
                    $_httpControllersList = scandir(dirname(dirname(__DIR__))."\\app\http\controllers");
                    foreach($_httpControllersList as $key => $value){
                        if($value != "." && $value != "..") {
                            require(dirname(dirname(__DIR__)) . "\\app\http\controllers\\" . $value);
                            Autoload::$App["Log"]->write("- - - - Loading App Controllers => " . $value . "() -- ", "\\app\http\controllers\\" . $value);
                        }
                    }
                    break;

                case "Route":
                    Require($path);
                    self::$App[$_file] = new $_file();
                    Autoload::$App["Log"]->write("Loading Object ".$_file."() -- ", $path);
                    if(self::$App[$_file]){
                        require (dirname(dirname(__DIR__))."\\routes\Web.php");

                    }
                    break;

                case "Database":
                    Require($path);
                    self::$App[$_file] = new $_file();
                    Autoload::$App["Log"]->write("Loading Object ".$_file."() -- ", $path);
                    break;

                case "Xml":
                    Require(dirname(__DIR__) . "\Xml\XmlManager.php");
                    Require($path);
                    self::$App[$_file] = new $_file();
                    self::$App["Log"]->write("Loading Object ".$_file."() -- ", $path);
                    break;

                case "Log":
                    Require(dirname(__DIR__) . "\Log\Logger.php");
                    Require($path);
                    self::$App[$_file] = new $_file();
                    self::$App["Log"]->write("Loading Object ".$_file."() -- ", $path);
                    break;
            }
        }
    }

}