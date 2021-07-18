<?php

class Models{

	private $_bdd;


	public function __CONSTRUCT( ){

		//$this->setBDD( );

	}

	public function read($field = "*"){

		if($field == NULL){ $field = "*"; }

		$sql = 'SELECT * FROM user';
		$req = $this->_bdd->query($sql);
		$data = $req->fetch();
		return $data;
	}

	public function setBDD( $bdd ){

		$this->_bdd = $bdd ;

	}

}