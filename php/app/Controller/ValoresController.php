<?php

/**
 * Arquivo ValoresController.php
 * @author Vinícius Kirst <vinicius@versul.com.br>
 */

App::uses('AppController', 'Controller');

class ValoresController extends AppController {

	public $uses = array('Objeto', 'Campo', 'Valor');
	
	public $components = array('RequestHandler');

	/**
	 * Exibe uma lista de campos
	*/
	public function index() {
		$campo_id = $this->request->query('campo_id');
		if ($campo_id) {
			$valores = $this->Valor->find('all', array('conditions' => array('campo_id' => $campo_id)));
			
			$this->set(array(
	            'valores' => $valores,
	            '_serialize' => array('valores')
	        ));
		} else {
			throw new BadRequestException('valor');
		}
	}
	
	public function add() {
		$this->Valor->create();
		if ($this->Valor->save($this->request->data)) {
			$message = 'Saved';
		} else {
			$message = 'Error';
		}
		$this->set(array(
				'message' => $message,
				'_serialize' => array('message')
		));
	}

	public function view($id) {
		$valor = $this->Valor->findById($id);
		$this->set(array(
				'valor' => $valor,
				'_serialize' => array('campo')
		));
	}
	
	public function edit($id) {
		$this->Valor->id = $id;
		if ($this->Valor->save($this->request->data)) {
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
		if ($this->Valor->delete($id)) {
			$message = 'Deleted';
		} else {
			$message = 'Error';
		}
		$this->set(array(
				'message' => $message,
				'_serialize' => array('message')
		));
	}
}

