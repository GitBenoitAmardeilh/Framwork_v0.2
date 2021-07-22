<?php
class Logger{

    private static $_path = __DIR__.'\\log.txt';
    private static $_file;

    public static function write( $content, $path = false, $isError = false ){

        $message = $content;

        if($path != false){

            $message .= $path;

        }

        if($isError == true){

            file_put_contents(self::$_path,"[ERROR] - [".Date("H:m:s")."] : ".$message."\n", FILE_APPEND);

        } else {

            file_put_contents(self::$_path, "[OK] - [" . Date("H:m:s") . "] : " . $message . "\n", FILE_APPEND);
        }

    }

    public static function stop(){

        fclose(self::$_file);

    }

    public static function start(){

        if(!file_exists(self::$_path)){

            self::$_file = fopen(self::$_path, 'w');

        }

    }

}