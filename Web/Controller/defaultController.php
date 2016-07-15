<?php
namespace Web\Controller;

use Library\parserLibrary;

class defaultController {
	var $data = array();

	var $titre = "Page principale";
	var $contenu = "En construction";

	public function indexAction() {
		$this->data['titre'] = $this->titre;
		$this->data['contenu'] = $this->contenu;

		$parser = new parserLibrary;
		$file = file_get_contents("./Resources/views/default.html");
		return $parser->parse($file, $this->data);
	}
}