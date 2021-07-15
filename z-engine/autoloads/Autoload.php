<?php

class Autoload{

    public static $_load = [];

    public static $_app = [];

    public static function addRequireFilesInProject(){

        $_autoload_file  = Require("z-engine\autoloads\Autoload_Class.php");

        foreach( $_autoload_file as $key => $value){

            $_arrLink = explode("\\",$value);
            $_file = substr($_arrLink[sizeOf($_arrLink)- 1], 0 ,-4);

            self::$_load[$_file] = $value;

            Require($value);

            if($_file == "Controller"){

                $_controllers = scandir(dirname(dirname(__DIR__))."\\app\http\controllers");
        
                foreach($_controllers as $key => $value){

                    if($value != "." && $value != "..")
                        require(dirname(dirname(__DIR__))."\\app\http\controllers\\".$value);
        
                }
            }

            if($_file == "Errors"){

                self::$_app[$_file] = new $_file();

            }

        }

    }

}