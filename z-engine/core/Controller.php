<?php

require(__DIR__.'\Core.php');

use app\http\Core\Core;

class Controller extends Core{


	/**
	 * $vars
	 *
     * Cette variable (tableau) vas permettre de faire passer
     * d'une page à l'autre des variables.
     */

	private $vars = array();
	private $layout;


	/**
     * Cette fonction vas permettre d'extraire dans vars, les données 
     * qui ont étaient insérées dans $tab, et les retournées à la vue.
     */

	public function setDonnees($tab){


		/**
		* array_merge()
		*
		*
		* Fusionne plusieurs tableaux en un seul. Le résultat est un 
		* tableau.
		**/

		$this->vars = array_merge($this->vars, $tab);

	}

	public function setLayout($lyt){

		$this->layout = $lyt;

	}

	/*inclu le fichier demandé*/
	public function render($filename){

		/**
		 * extract($this->vars);
		 *
	     * Permet d'extraire toutes les données contenues dans vars
	     * Afin de les affichées dans la page demander.
	     */

		extract($this->vars);

		/*Charge le contenu d'une page dans la varible $content_for_layout*/
		ob_start();
		require('ressources/'.$filename.'.php');
		$content_for_layout = ob_get_clean();

		/*Si le layout est vide, afficher la page demandée*/
		if($this->layout == false){
			echo $content_for_layout;
		}
		else{
			require('views/layouts/'.$this->layout.'.php');
		}

	}

	/**
     * Cette fonction vas permettre de charger un modele dans le controlleur 
     * correspondant.
     */

	public function loadModel($nameModel){

		require_once('Models/'.lcfirst($nameModel).'.php');
		$this->$nameModel = new $nameModel();

	}

}