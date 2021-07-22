<?php
class Logger{

    /**
     * @var string
     */
    protected $_path = __DIR__.'\\log.txt';

    /**
     * @var
     */
    protected $_file;

    /**
     * @param $content
     * @param false $path
     * @param false $isError
     * Write in XML File
     */
    public function write( $content, $path = false, $isError = false )
    {
        $message = $content;

        if($path != false) {
            $message .= $path;
        }

        if($isError == true) {
            file_put_contents($this->_path,"[ERROR] - [".Date("H:m:s")."] : ".$message."\n", FILE_APPEND);
        } else {
            file_put_contents($this->_path, "[OK] - [" . Date("H:m:s") . "] : " . $message . "\n", FILE_APPEND);
        }

    }

    /**
     * @param null
     * Close this fil represent by the pointer self::$file
     */
    public function stop()
    {
        fclose($this->_file);
    }

    public function getFileXml()
    {
        return file($this->_path);
    }

}