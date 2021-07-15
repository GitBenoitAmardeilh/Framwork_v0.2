<?php

require("RouterActions.php");

class Router extends RouterActions{

    /**
     * @var string
     * Contient l'URL saisie
     */
    private $url;


    /**
     * @var string
     * the name of called controller
     */
    private $controller;


    /**
     * @var string
     * the name of called action
     * 
     */
    private $action;


    /**
     * Calls the controller
     * 
     * @return void
     */
    public function launch(){

        $controller = $this->controller;
        $controller = new $controller();
        $actions = $this->action;

        $controller->$actions();

    }


    /**
     * Check that the URL exists in the table self::$getList
     * 
     * @return void
     */
    public function agent(){

        // Save URL in $getList array()
        $this->url = $_GET['p'];

        $exist = false;
        
        try {
            
            foreach(self::$_RContainer as $key => $value){

                if( $this->url == str_replace("/","",$key)){
  
                    $this->controller = $value[0];
                    $this->action = $value[1];
                    $exist = true;

                    break;
    
                }

            }

            if($exist == false)
                throw new Exception("ROUTE [404] - Unknown URL");

        } catch (Exception $e) {

            Autoload::$_app["Errors"]->getMessage();

        }

    }

}