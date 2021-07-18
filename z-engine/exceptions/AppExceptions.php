<?php

Abstract class AppExceptions{

    private $_inError = false;

    private $_errorInfos = array();

    public function getMessage(){

        $this->setInError(true);

    }

    public function setInError( $bool ) { 

        $this->_inError = $bool;

    }

    public function getInError(){

        return $this->_inError;

    }

    public function view(){

        Autoload::$App["Controller"]->errorRender("errors");

    }

    public function save($e){

        $this->_errorInfos[sizeOf($this->_errorInfos)] = "bonj";

    }

    public function getErrorInfos(){

        return $this->_errorInfos;

    }

}