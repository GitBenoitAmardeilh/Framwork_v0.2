<?php 

$route->get("/",[WelcomeController::class , "index"]);
$route->get("/accueil",[WelcomeController::class , "accueil"]);

$route->post("/form",[WelcomeController::class , "form"]);
