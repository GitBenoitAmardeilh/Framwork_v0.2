<?php

Abstract class RouterActions{

    private $_RContainer = [];

    private $_PContainer = [];

    /**
     * @param string $routeName
     * @param array $data
     * @return void
     * 
     * $data => [$controller,$method()]
     */
    public function get( $route , $data ){

        $this->setRContainer( $route , $data );

    }

    /**
     * @param string $routeName
     * @param array $data
     * @return void
     * 
     * $data => [$controller,$method()]
     */
    public function post( $route , $data ){

        $this->setRContainer( $route , $data );
        $this->explodeArray($_POST);

    }

    /**
     * @param array $data
     * @return void
     */
    public function explodeArray( $array ){

        foreach( $array as $key => $value ){

            if(gettype($array[$key]) == "array"){

                $this->explodeArray($array[$key]);

            } else {

                $this->_PContainer[$key] = $value;

            }

        }
        
    }

    public function getRContainer(){

        return  $this->_RContainer;

    }

    public function setRContainer( $route , $data ){

        $this->_RContainer[$route] = $data;

    }

    public function getPContainer(){

        return  $this->_PContainer;

    }
    
}