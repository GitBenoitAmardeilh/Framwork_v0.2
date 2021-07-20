<?php

require("RouterActions.php");

class Route extends RouterActions{

    /**
     * @var string
     * Contient l'URL saisie
     */
    private $url;


    /**
     * @var string
     * the name of called controller
     */
    private $_controller;


    /**
     * @var string
     * the name of called action
     * 
     */
    private $_action;


    /**
     * Calls the controller
     * 
     * @return void
     */
    
    public function redirectToController(){

        $controller = $this->_controller;
        $controller = new $controller();
        $controller->setDataForm($this->getPContainer());
        
        $actions = $this->_action;

        $controller->$actions();
    }


    /**
     * Check that the URL exists in the table self::$getList
     * 
     * @return void
     */
    public function assignControllerAndAction(){

        // Save URL in $getList array()
        $this->url = $_GET['p'];

        $exist = false;

        try {
            
            foreach($this->getRContainer() as $key => $value){

                if( $this->url == substr($value['Route'],1,strlen($value['Route']))){

                    $this->_controller = $value["Controller"];
                    $this->_action = $value["Method"];

                    $exist = true;
                    break;
    
                }

            }

            if($exist == false)
                throw new Exception("ROUTE [404] - Unknown URL");

        } catch (Exception $e) {

            Autoload::$App["Errors"]->save($e,$this);

        }

    }

}