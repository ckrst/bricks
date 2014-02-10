<?php

/**
 * Arquivo ObjetosController.php
*
* @author Vinícius Kirst <vinicius@versul.com.br>
*/

App::uses('AppController', 'Controller');

class ObjetosController extends AppController {

	public $uses = array('Objeto');
	
	public $components = array('RequestHandler');

	/**
	 * Exibe uma lista de objetos
	 */
	public function index() {

		$objetos = $this->Objeto->find('all');

		$this->set(array(
            'objetos' => $objetos,
            '_serialize' => array('objetos')
        ));
	}
	
	public function add() {
		$this->Objeto->create();
		if ($this->Objeto->save($this->request->data)) {
			$id = $this->Objeto->id;
			$message = 'Saved ' . $id;
		} else {
			$message = 'Error';
		}
		$this->set(array(
				'message' => $message,
				'_serialize' => array('message')
		));
	}

	public function view($id) {
		$objeto = $this->Objeto->findById($id);
		$this->set(array(
				'objeto' => $objeto,
				'_serialize' => array('objeto')
		));
	}
	
	public function edit($id) {
		$this->Objeto->id = $id;
		if ($this->Objeto->save($this->request->data)) {
			$message = 'Saved';
		} else {
			$message = 'Error';
		}
		$this->set(array(
				'message' => $message,
				'_serialize' => array('message')
		));
	}
	
	public function delete($id) {
		if ($this->Objeto->delete($id)) {
			$message = 'Deleted';
		} else {
			$message = 'Error';
		}
		$this->set(array(
				'message' => $message,
				'_serialize' => array('message')
		));
	}
	
	
	public function editor()
	{
	}
}

