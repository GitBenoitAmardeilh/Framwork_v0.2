<?php

Abstract class AppExceptions{

    private $_inError = false;

    public function getMessage(){

        //echo "ok";
        $this->setInError(true);
        //echo $this->getInError();
    }

    public function setInError( $bool ) { 

        $this->_inError = $bool;

    }

    public function getInError(){

        return $this->_inError;

    }

    public function view($e){

        echo "<pre>";
        var_dump($e->getMessage());
        echo "</pre>";

        //get_class($this) == "Errors"
        
        exit;

    }

}