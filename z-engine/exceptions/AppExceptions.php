<?php

//Require(__DIR__."\ExceptionManager.php");

Abstract class AppExceptions extends ExceptionManager{

    private $_errorInfos = array();

    public function __CONSTRUCT(){

        $this->setAttrException();

    }

    public function view(){

        Autoload::$App["Controller"]->errorRender("errors");

    }

    public function save( $e ){

        $this->createXmlFile( $e );
        $this->_errorInfos[sizeOf($this->_errorInfos)] = $e;

    }

    public function getErrorInfos(){

        return $this->_errorInfos;

    }
}