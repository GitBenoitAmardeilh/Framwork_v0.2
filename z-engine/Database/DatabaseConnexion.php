<?php

class DatabaseConnexion{

    protected $_bdd;

    private $_isConnect = false;

	public function __CONSTRUCT(){

		$this->getConnexionDB();

	}

	public function getConnexionDB(){

        $_db_infos = require(dirname(dirname(__DIR__))."\config\Database_Config.php");

		try {

			$this->_bdd = new PDO('mysql:host='.$_db_infos['HOST'].';dbname='.$_db_infos['DATABASE'],$_db_infos['USER_NAME'],$_db_infos['PASSWORD']);
			$this->_bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$this->_isConnect = true;

		} catch (PDOException $e) {

			Autoload::$App["Err"]->save($e);

		}
        
	}

    /**
     * Return PDO connexion
     */
    public function getBDD(){

		return $this->_bdd;

	}

    public function getIsConnect(){

		return $this->_isConnect;
        
	}

}