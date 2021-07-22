<?php

//Require(__DIR__."\ExceptionManagerXml.php");

use ManagerXml\ExceptionManagerXml;

Abstract class ExceptionManager extends Exception{

    private $_AttrList = array();
    
    /**
     * Save all attributs of Exception() in $_AttrList array;
     */
    public function setAttrException()
    {
        foreach(new Exception as $attr => $value){
            $this->_AttrList[$attr] = $attr;
        }
    }

    /**
     * Return all attributs 
     */
    public function getAttrList()
    {
        return $this->_AttrList;
    }

    /**
     * @param $e
     */
    public function createXmlFile( $e )
    {
        $managerXml = new ExceptionManagerXml();
        $managerXml->explodeException( $e );
    }

    

}