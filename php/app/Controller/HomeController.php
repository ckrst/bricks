<?php

/**
 * Arquivo CamposController.php
* @author Vinícius Kirst <vinicius@versul.com.br>
*/

App::uses('AppController', 'Controller');

class HomeController extends AppController {

	/**
	 * Exibe uma lista de campos
	*/
	public function index() {
		$this->render();
	}
}

