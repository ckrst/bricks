<?php

/**
 * Arquivo MashupsController.php
*
* @author Vinícius Kirst <vinicius@versul.com.br>
*/

App::uses('AppController', 'Controller');

class MashupsController extends AppController {

	public $uses = array('Mashup', 'Widget', 'Campo', 'Chave', 'Valor', 'MashupWidget');

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
		$mashup = $this->Mashup->findById($id);
		$this->set(array(
				'mashup' => $mashup,
				'_serialize' => array('mashup')
		));
	}

	public function edit($id) {
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
