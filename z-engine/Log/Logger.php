<?php
class Logger{

    /**
     * @var string
     */
    private static $_path = __DIR__.'\\log.txt';

    /**
     * @var
     */
    private static $_file;

    /**
     * @param $content
     * @param false $path
     * @param false $isError
     * Write in XML File
     */
    public static function write( $content, $path = false, $isError = false )
    {
        $message = $content;

        if($path != false) {
            $message .= $path;
        }

        if($isError == true) {
            file_put_contents(self::$_path,"[ERROR] - [".Date("H:m:s")."] : ".$message."\n", FILE_APPEND);
        } else {
            file_put_contents(self::$_path, "[OK] - [" . Date("H:m:s") . "] : " . $message . "\n", FILE_APPEND);
        }

    }

    /**
     * @param null
     * Close this fil represent by the pointer self::$file
     */
    public static function stop()
    {
        fclose(self::$_file);
    }

    /**
     * @param null
     * Create file from the dir self::$path
     */
    public static function start()
    {
        self::$_file = fopen(self::$_path, 'w');
    }

}