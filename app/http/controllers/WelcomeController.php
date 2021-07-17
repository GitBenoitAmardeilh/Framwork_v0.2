<?php

class WelcomeController extends Controller{

    public function index(){

        $this->render("Welcome");

    }

    public function form(){

        echo "<pre>";
        var_dump($this->getDataForm());
        echo "</pre>";

        $test = Autoload::$App["Models"]->read();

    }

    public function accueil(){

        $this->render("Accueil");

    }

}