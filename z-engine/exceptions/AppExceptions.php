<?php

Require(__DIR__."\ExceptionManager.php");

Abstract class AppExceptions extends ExceptionManager{

    private $_errorInfos = array();

    public function view(){

        Autoload::$App["Controller"]->errorRender("errors");

    }

    public function save( $e ){

        $this->_errorInfos[sizeOf($this->_errorInfos)] = $this->explodeException( $e );

    }

    public function getErrorInfos(){

        return $this->_errorInfos;

    }
}