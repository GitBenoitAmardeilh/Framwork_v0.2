<?php

require(dirname(__DIR__).'\Core.php');

use app\http\Core\Core;

class Controller extends Core{

	private $_dataForm = array();

	public function setDataForm( $data ){

		$this->_dataForm = array_merge($this->_dataForm, $data);

	}

	public function getDataForm(){

		return $this->_dataForm;

	}

}