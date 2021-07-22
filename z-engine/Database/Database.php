<?php

require(__DIR__.'\DatabaseConnexion.php');

class Database extends DatabaseConnexion{

    /**
     * Database constructor.
     */
	public function __CONSTRUCT()
    {
        /**
         * Un commentaire à supprimer
         */
		$this->getConnexionDB();
	}

}