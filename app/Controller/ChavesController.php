<?php

/**
 * Arquivo ChavesController.php
 * @author Vinícius Kirst <vinicius.kirst@gmail.com>
 */

App::uses('AppController', 'Controller');

class ChavesController extends AppController {

	public $uses = array('Objeto', 'Chave');
	
	public $components = array('RequestHandler');

	/**
	 * Exibe uma lista de chaves
	*/
	public function index() {
		$objeto_id = $this->request->query('objeto_id');
		if ($objeto_id) {
			$chaves = $this->Chave->find('all', array('conditions' => array('objeto_id' => $objeto_id)));
			
			$this->set(array(
	            'chaves' => $chaves,
	            '_serialize' => array('chaves')
	        ));
		} else {
			throw new BadRequestException('objeto');
		}
	}
	
	public function add() {
		$this->Chave->create();
		if ($this->Chave->save($this->request->data)) {
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
		$chave = $this->Chave->findById($id);
		$this->set(array(
				'chave' => $chave,
				'_serialize' => array('chave')
		));
	}
	
	public function edit($id) {
		$this->Chave->id = $id;
		if ($this->Chave->save($this->request->data)) {
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
		if ($this->Chave->delete($id)) {
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

