<?php

require(__DIR__.'\DatabaseConnexion.php');

class Database extends DatabaseConnexion{

	public function __CONSTRUCT(){

		$this->getConnexionDB();

	}

}