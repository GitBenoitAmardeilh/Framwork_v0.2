<?php 

Autoload::$App["Route"]->get("/",[WelcomeController::class , "index"]);
Autoload::$App["Route"]->get("/accueil",[WelcomeController::class , "accueil"]);

Autoload::$App["Route"]->post("/form",[WelcomeController::class , "form"]);
