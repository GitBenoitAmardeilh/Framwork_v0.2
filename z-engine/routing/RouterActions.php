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

        $this->testRArray( $route , $data,"GET");

    }

    /**
     * @param string $routeName
     * @param array $data
     * @return void
     * 
     * $data => [$controller,$method()]
     */
    public function post( $route , $data ){

        $this->testRArray( $route , $data , "POST" );
        $this->explodePOSTArray($_POST);

    }

    /**
     * @param array $data
     * @return void
     */
    public function explodePOSTArray( $array ){

        foreach( $array as $key => $value ){

            if(gettype($array[$key]) == "array"){

                $this->explodePOSTArray($array[$key]);

            } else {

                $this->_PContainer[$key] = $value;

            }

        }
        
    }

    public function testRArray( $route , $data , $type){

        $this->_RContainer[] = [
                "Type" => $type,
                "Route" => $route,
                "Controller" => $data[0],
                "Method" => $data[1],
        ];   

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