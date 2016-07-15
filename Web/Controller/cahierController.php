<?php
namespace Web\Controller;

use Library\parserLibrary;

class cahierController {

	var $data = array();

	var $titre = "Cahier des charges";
	var $section = array(
		"1" => array(
			"1" => "Joueur",
			"2" => "Création d'un compte (forum)",
			"3" => "Connexion",
			"4" => "Panel d'utilisateur (forum)",
			"5" => "Déconnexion",
			"6" => "Notification d'erreur ou succès lors de la connexion et déconnexion"
		),

		"2" => array(
			"1" => "Serveur",
			"2" => "Affichage du nombre de joueur connectés",
			"3" => "Affichage de l'IP du serveur",
			"4" => "Affichage de la version du serveur"
		),

		"3" => array(
			"1" => "Menu",
			"2" => "Menu déroulant avec divers catégories",
			"4" => "Créer, modifier ou supprimer les pages"
		)
	);

	public function indexAction() {
		$this->data['titre'] = $this->titre;
		$this->data['section'] = $this->addSection();

		$parser = new parserLibrary;
		$file = file_get_contents("./Documentation/cahier.html");

		return $parser->parse($file, $this->data);
	}

	private function addSection() {
		$contenu = "";

		foreach ($this->section as $key => $value) {
			$chaque_section = $value;

			$contenu .=  '<p>' . $value['1'] . '</p>';
			$contenu .=	'<ul>';
			foreach ($chaque_section as $key => $value) {
				if($key != 1) {
					$contenu .= "<li>" . $value . "</li>";
				}
			}
			$contenu .= '</ul>';
		}

		return $contenu;
	}
}