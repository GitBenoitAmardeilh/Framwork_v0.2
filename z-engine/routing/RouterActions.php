<?php

Abstract class RouterActions{

    /**
     * @var array
     */
    private $_RContainer = [];

    /**
     * @var array
     */
    private $_PContainer = [];

    /**
     * @param string $routeName
     * @param array $data
     * @return void
     * 
     * $data => [$controller,$method()]
     */
    public function get( $route , $data )
    {
        $this->setRContainer( $route , $data,"GET");
        Autoload::$App["Log"]->write("GET Route [ ".$route." ] ", ".\\routes\Web.php");
    }

    /**
     * @param string $routeName
     * @param array $data
     * @return void
     * 
     * $data => [$controller,$method()]
     */
    public function post( $route , $data )
    {
        $this->setRContainer( $route , $data , "POST" );
        $this->explodePOSTArray($_POST);
    }

    /**
     * @param array $data
     * @return void
     */
    public function explodePOSTArray( $array )
    {
        foreach( $array as $key => $value ){
            if(gettype($array[$key]) == "array"){
                $this->explodePOSTArray($array[$key]);
            } else {
                $this->_PContainer[$key] = $value;
            }
        }
    }

    /**
     * @param $route
     * @param $data
     * @param $type
     * Initialise $this->_RContainer with params values
     */
    public function setRContainer( $route , $data , $type)
    {
        $this->_RContainer[] = [
                "Type" => $type,
                "Route" => $route,
                "Controller" => $data[0],
                "Method" => $data[1],
        ];
    }

    /**
     * @return array
     */
    public function getRContainer()
    {
        return  $this->_RContainer;
    }

    /**
     * @return array
     */
    public function getPContainer()
    {
        return  $this->_PContainer;
    }
    
}