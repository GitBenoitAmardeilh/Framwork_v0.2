<?php

class WelcomeController extends Controller{

    public function index(){

        /**
         * Commentaire à supprimmer
         */
        $this->render("Welcome");

    }

    public function form(){

        $test = Autoload::$App["Models"]->read();

    }

}