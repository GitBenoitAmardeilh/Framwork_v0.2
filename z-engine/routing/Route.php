<?php

class Route extends Router{

    public function __CONSTRUCT(){

        require (dirname(dirname(__DIR__))."\\routes\Web.php");
        $this->agent();

    }

}