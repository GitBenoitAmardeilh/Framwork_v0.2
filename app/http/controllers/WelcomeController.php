<?php

class WelcomeController extends Controller{

    public function index(){

        $this->render("Welcome");

    }

    public function form(){

        $test = Autoload::$App["Models"]->read();

    }

    public function accueil(){

        $this->render("Accueil");

    }

}