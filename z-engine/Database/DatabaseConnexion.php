<?php

Abstract class DatabaseConnexion{
    /**
     * @var
     */
    protected $_bdd;

    /**
     * @var bool
     */
    private $_isConnect = false;

    /**
     * DatabaseConnexion constructor.
     */
	public function __CONSTRUCT(){

	}

    /**
     * Get connexion database
     */
	public function getConnexionDB()
    {
        $_db_infos = require(dirname(dirname(__DIR__))."\config\Database_Config.php");

		try {
			$this->_bdd = new PDO('mysql:host='.$_db_infos['HOST'].';dbname='.$_db_infos['DATABASE'],$_db_infos['USER_NAME'],$_db_infos['PASSWORD']);
			$this->_bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$this->_isConnect = true;
		} catch (PDOException $e) {
			Autoload::$App["Errors"]->save($e);
			Logger::write("Erreur de connexion à la Database [ ".$_db_infos['DATABASE']." ]", false, true);
		}
	}

    /**
     * @return mixed
     */
    public function getBDD()
    {
		return $this->_bdd;
	}

    /**
     * @return bool
     */
    public function getIsConnect()
    {
		return $this->_isConnect;
	}

}