<?php

/**
 * Arquivo CamposController.php
 * @author Vinícius Kirst <vinicius@versul.com.br>
 */

App::uses('AppController', 'Controller');

class CamposController extends AppController {

	public $uses = array('Objeto', 'Campo');
	
	public $components = array('RequestHandler');

	/**
	 * Exibe uma lista de campos
	*/
	public function index() {
		$objeto_id = $this->request->query('objeto_id');
		if ($objeto_id) {
			$campos = $this->Campo->find('all', array('conditions' => array('objeto_id' => $objeto_id)));
			
			$this->set(array(
	            'campos' => $campos,
	            '_serialize' => array('campos')
	        ));
		} else {
			throw new BadRequestException('objeto');
		}
	}
	
	public function add() {
		$this->Campo->create();
		if ($this->Campo->save($this->request->data)) {
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
		$campo = $this->Campo->findById($id);
		$this->set(array(
				'campo' => $campo,
				'_serialize' => array('campo')
		));
	}
	
	public function edit($id) {
		$this->Campo->id = $id;
		if ($this->Campo->save($this->request->data)) {
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
		if ($this->Campo->delete($id)) {
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

