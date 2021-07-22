<?php

/**
 * Errors.php est chargé en premier dans Autoload_Class.php. Le require est inlue seulement ici
 * Permet de récuperer une instance de Errors() au niveau de AppExceptions()
 */
//Require(__DIR__."\AppExceptions.php");

class Errors extends AppExceptions{

    public function __CONSTRUCT(){

        parent::__construct();

    }

}