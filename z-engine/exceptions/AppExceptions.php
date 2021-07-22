<?php

//Require(__DIR__."\ExceptionManager.php");

Abstract class AppExceptions extends ExceptionManager{

    /**
     * @var array
     */
    private $_errorInfos = array();

    /**
     * AppExceptions constructor.
     */
    public function __CONSTRUCT()
    {
        $this->setAttrException();
    }

    /**
     * Return the error view
     */
    public function view()
    {
        Autoload::$App["Controller"]->errorRender("errors");
    }

    /**
     * @param $e
     */
    public function save( $e )
    {
        $this->createXmlFile( $e );
        $this->_errorInfos[sizeOf($this->_errorInfos)] = $e;
    }

    /**
     * @return array
     */
    public function getErrorInfos()
    {
        return $this->_errorInfos;
    }
}