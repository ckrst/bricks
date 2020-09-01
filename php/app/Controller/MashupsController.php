<?php

/**
 * Arquivo MashupsController.php
*
* @author Vinícius Kirst <vinicius@versul.com.br>
*/

App::uses('AppController', 'Controller');

class MashupsController extends AppController {

	public $uses = array('Mashup', 'Widget', 'Campo', 'Chave', 'Objeto', 'Valor', 'MashupWidget', 'Userapp');

	public $components = array('RequestHandler', 'Session');

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
		// echo "<PRE>";
		// var_dump($mashupWidgets);

		$objetos = array();
		$valores = array();
		$chaves = array();
		$campos = array();
		foreach ($mashupWidgets as $mashupWidget) {
			// var_dump($objeto);
			$widget = $this->Widget->read (null, $mashupWidget['Widget']['id']);

			$this->Objeto->id = $widget['Objeto']['id'];
			// $objeto = $this->Widget->getObjeto($mashupWidget);


			// $this->Objeto->id = $objeto['Objeto']['id'];
			$objeto = $this->Objeto->read (null, $widget['Objeto']['id']);

			$objChaves = $this->Chave->find('all', array('conditions' => array('objeto_id' => $widget['Objeto']['id'])));
			$objCampos = $this->Campo->find('all', array('conditions' => array('objeto_id' => $widget['Objeto']['id'])));

			$objValores = array();
			foreach ($objChaves as $chave) {
				foreach ($objCampos as $campo) {
					$objValores[$chave['Chave']['id']][$campo['Campo']['id']] = $this->Valor->find('first', array('conditions' => array('chave_id' => $chave['Chave']['id'], 'campo_id' => $campo['Campo']['id'])));
				}
			}

			array_push($objetos, $objeto);
			array_push($chaves, $objChaves);
			array_push($campos, $objCampos);
			array_push($valores, $objValores);
		}


		$this->set('mashup', $mashup);
		$this->set('objetos', $objetos);
		$this->set('chaves', $chaves);
		$this->set('valores', $valores);
		$this->set('campos', $campos);
		$this->set('mashupWidgets', $mashupWidgets);
		$this->set('mashupContent', $layoutContent);

		//$this->set('foo', 'bar');
	}

	public function editor($id) {
		$mashup = $this->Mashup->read(null, $id);
		$userapp = $this->Userapp->read(null, $mashup['Mashup']['app_id']);
		$widgets = $this->Widget->find('all', array('conditions' => array('Objeto.app_id' => $userapp['Userapp']['id'])));

		if ($this->request->is('post')) {
			//die(var_dump($this->request->data));
			if ($this->Mashup->save($this->request->data)) {
				$this->MashupWidget->deleteAll(array('mashup_id' => $this->Mashup->id));
				foreach ($this->request->data['MashupWidget'] as $index => $itemMashupWidget) {
					$mashupWidget = array(
						'MashupWidget' => array(
							'widget_id' => $itemMashupWidget['widget_id'],
							'mashup_id' => $this->Mashup->id,
							'zona' => $index,
							'ordem' => 1
						)
					);
					$this->MashupWidget->create();
					$this->MashupWidget->save($mashupWidget);
				}

				$this->Session->setFlash('Mashup saved', 'flash_success');
				$mashup = $this->Mashup->read(null, $id);
			}
		}

		$this->set('mashup', $mashup);
		$this->set('userapp', $userapp);
		$this->set('widgets', $widgets);
	}

}
