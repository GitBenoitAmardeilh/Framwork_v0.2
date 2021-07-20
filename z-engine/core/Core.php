<?php

namespace app\http\Core;

class Core{

	/**
	 * $vars
	 *
     * Cette variable (tableau) vas permettre de faire passer
     * d'une page à l'autre des variables.
     */

	private $vars = array();
	private $layout = true;


	/**
     * Cette fonction vas permettre d'extraire dans vars, les données 
     * qui ont étaient insérées dans $tab, et les retournées à la vue.
     */

	public function setData($array){

		/**
		* array_merge()
		*
		*
		* Fusionne plusieurs tableaux en un seul. Le résultat est un 
		* tableau.
		**/

		$this->vars = array_merge($this->vars, $array);

	}

	public function setLayout($filename){

		$this->layout = $filename;

	}

	/*inclu le fichier demandé*/
	public function render($filename){

		extract($this->vars);

		ob_start();
		require('ressources/'.$filename.'.php');
		$content_for_layout = ob_get_clean();
		
		if($this->layout == false){
			echo $content_for_layout;
		}
		else{
			require(dirname(__DIR__).'\Config\View\ConfigDashboard.php');
		}

	}

	/*inclu le fichier demandé*/
	public function errorRender($filename){

		if(file_exists(dirname(__DIR__).'\\Exceptions\\Xml\\Exception.xml')){
			$xml = simplexml_load_file(dirname(__DIR__).'\\Exceptions\\Xml\\Exception.xml');
		} else {
			$xml = simplexml_load_file(dirname(__DIR__).'\\Exceptions\\Xml\\PDOException.xml');
		}

		ob_start();
		require(dirname(__DIR__).'\Exceptions\Views\\'.$filename.'.php');
		$content_for_layout = ob_get_clean();
		
		if($this->layout == false){

			echo $content_for_layout;
		}
		else{
			require(dirname(__DIR__).'\Config\View\ConfigDashboard.php');
		}

	}


}