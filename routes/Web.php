<?php 

Autoload::$App["Route"]->get("/",[WelcomeController::class , "index"]);
Autoload::$App["Route"]->get("/accueil/test",[WelcomeController::class , "accueil"]);
Autoload::$App["Route"]->get("/magasin",[WelcomeController::class , "magasin"]);

Autoload::$App["Route"]->post("/form",[WelcomeController::class , "form"]);

