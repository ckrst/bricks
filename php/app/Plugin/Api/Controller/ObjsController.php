<?php

/**
 * Arquivo ObjsController.php
*
* @author Vinícius Kirst <vinicius@versul.com.br>
*/

App::uses('ApiAppController', 'Controller');

class ObjsController extends ApiAppController {

	public $uses = array('Mashup', 'Widget', 'Objeto','Campo', 'Chave', 'Valor', 'MashupWidget');

	public $components = array('RequestHandler');

	/**
	 * Exibe uma lista de mashups
	 */
	public function index() {
		$mashups = $this->Mashup->find('all');
		$this->set(array(
            'mashups' => $mashups,
            '_serialize' => array('mashups')
        ));
	}

	public function add() {
		$this->Mashup->create();
		if ($this->Mashup->save($this->request->data)) {
			$id = $this->Mashup->id;
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

		$data[$objeto['Objeto']['nome']] = array();

		$campos = $this->Campo->find('all', array('conditions' => array('objeto_id' => $id), 'order' => array('ordem')));

		$chaves = $this->Chave->find('all', array('conditions' => array('objeto_id' => $id)));

		if (count($chaves)) {
			foreach ($chaves as $chaveItem) {
				$item = array();

				$item['id'] = $chaveItem['Chave']['id'];

				if (count($campos)) {
					foreach ($campos as $campoItem) {
						$valor = $this->Valor->find('first', array('conditions' => array('chave_id' => $chaveItem['Chave']['id'], 'campo_id' => $campoItem['Campo']['id'])));
						if ($valor) {
							$item[$campoItem['Campo']['nome']] = $valor['Valor']['valor_campo'];
						} else {
							$item[$campoItem['Campo']['nome']] = '';
						}
					}

				}

				array_push($data[$objeto['Objeto']['nome']], $item);
			}
		}
						//die(var_dump($data));

		$this->set(array(
            $objeto['Objeto']['nome'] => $data[$objeto['Objeto']['nome']],
            '_serialize' => array($objeto['Objeto']['nome'])
        ));
	}

	public function edit($id, $chaveId = null) {
        $this->RequestHandler->addInputType('json', array('json_decode', true));
        die(var_dump($this->request->data));

		$objeto = $this->Objeto->findById($id);

		if (null !== $chaveId) {
			$chave = $this->Chave->findById($chaveId);

		}

		$this->Mashup->id = $id;
		if ($this->Mashup->save($this->request->data)) {
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
		if ($this->Mashup->delete($id)) {
			$message = 'Deleted';
		} else {
			$message = 'Error';
		}
		$this->set(array(
				'message' => $message,
				'_serialize' => array('message')
		));
	}

	public function run($id)
	{

		//$this->layout = 'mashup';

		$this->Mashup->id = $id;
		if (! $this->Mashup->exists ()) {
			$this->flashError ('Oops');
			return;
		}

		$mashup = $this->Mashup->read(null, $id);

		$layoutContent = '';
		switch ($mashup['Mashup']['layout']) {
			case MASHUP_LAYOUT_FULLPAGE:
				$layoutContent = 'mashupLayoutFullpage';
				break;
			default:
				break;
		}

		$mashupWidgets = $this->MashupWidget->find('all', array('conditions' => array('mashup_id' => $mashup['Mashup']['id'])));

		$this->set('mashup', $mashup);
		$this->set('mashupWidgets', $mashupWidgets);
		$this->set('mashupContent', $layoutContent);

		//$this->set('foo', 'bar');
	}

}
