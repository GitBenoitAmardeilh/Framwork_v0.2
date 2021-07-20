<?php

class Autoload{

    /**
     * @var array
     * Contient les objets $App[ "Errors" , "Database" ]
     */
    public static $App = [];

    public function __CONSTRUCT(){

            $this->addRequireFilesInProject();

    }

    /**
     * Add all requires in project
     * @return void 
     */
    public function addRequireFilesInProject(){

        $_autoload_file  = Require("z-engine\autoloads\Autoload_Class.php");

        foreach( $_autoload_file as $key => $value){

            $_arrLink = explode("\\",$value);
            $_file = substr($_arrLink[sizeOf($_arrLink)- 1], 0 ,-4);

            Require($value);

            switch( $_file ){

                case "Controller":
                    $_httpControllersList = scandir(dirname(dirname(__DIR__))."\\app\http\controllers");
            
                    foreach($_httpControllersList as $key => $value){

                        if($value != "." && $value != "..")
                            require(dirname(dirname(__DIR__))."\\app\http\controllers\\".$value);
            
                    }
                    self::$App[$_file] = new $_file();
                    break;

                case "Route":
                    if(self::$App[$_file] = new $_file()){
                        require (dirname(dirname(__DIR__))."\\routes\Web.php");
                    }
                    break;
                default:
                    self::$App[$_file] = new $_file();
                    break;

            }

            //self::$App[$_file] = new $_file();

        }

    }

}