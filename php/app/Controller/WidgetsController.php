<?php

/**
 * Arquivo WidgetController.php
 *
 * @author Vinícius Kirst <vinicius.kirst@gmail.com>
 */

App::uses ('AppController', 'Controller');

class WidgetsController extends AppController {

	public $uses = array('Objeto','Widget', 'Campo', 'Chave', 'Valor' );

	public $components = array('RequestHandler' );

	/**
	 * Exibe uma lista de widgets
	 */
	public function index () {

		$objeto_id = $this->request->query ('objeto_id');
		if ($objeto_id) {
			$widgets = $this->Widget->find ('all', array('conditions' => array('objeto_id' => $objeto_id ) ));

			//echo "<PRE>";die(var_dump($widgets));

			$this->set (array('widgets' => $widgets,'_serialize' => array('widgets' ) ));
		} else {
			throw new BadRequestException ('objeto');
		}
	}

	public function add () {

		$this->Widget->create ();
		if ($this->Widget->save ($this->request->data)) {
			$message = 'Saved';
		} else {
			$message = 'Error';
		}
		$this->set (array('message' => $message,'_serialize' => array('message' ) ));
	}

	public function view ($id) {

		$widget = $this->Widget->findById ($id);
		$this->set (array('widget' => $widget,'_serialize' => array('widget' ) ));
	}

	public function edit ($id) {

		$this->Widget->id = $id;
		if ($this->Widget->save ($this->request->data)) {
			$message = 'Saved';
		} else {
			$message = 'Error';
		}
		$this->set (array('message' => $message,'_serialize' => array('message' ) ));
	}

	public function delete ($id) {

		if ($this->Widget->delete ($id)) {
			$message = 'Deleted';
		} else {
			$message = 'Error';
		}
		$this->set (array('message' => $message,'_serialize' => array('message' ) ));
	}

	/**
	 * Roda um widget
	 *
	 * @param number $id ID do Widget
	 */
	public function run ($id, $chave_id = NULL) {
		//
		$this->Widget->id = $id;
		if (! $this->Widget->exists ()) {
			$this->flashError ('Oops');
			return;
		}
		$widget = $this->Widget->read (null, $id);

		$this->Objeto->id = $widget['Objeto']['id'];
		$objeto = $this->Objeto->read (null, $widget['Objeto']['id']);

		switch (intval($widget['Widget']['tipo'])) {
			case WIDGET_TIPO_TABELA:
				$widgetContent = 'widget_tabela';
				break;
			case WIDGET_TIPO_BUTTON_POPUP_INSERTER:
				$widgetContent = 'widget_btn_popup_inserter';
				break;
			default:
				break;
		}

		$campos = $this->Campo->find('all', array('conditions' => array('objeto_id' => $widget['Objeto']['id'])));

		$chaves = $this->Chave->find('all', array('conditions' => array('objeto_id' => $widget['Objeto']['id'])));

		$valores = array();
		foreach ($chaves as $chave) {
			foreach ($campos as $campo) {
				$valores[$chave['Chave']['id']][$campo['Campo']['id']] = $this->Valor->find('first', array('conditions' => array('chave_id' => $chave['Chave']['id'], 'campo_id' => $campo['Campo']['id'])));
			}
		}

		$this->set('objeto', $objeto);
		$this->set('widget', $widget);
		$this->set('campos', $campos);
		$this->set('chaves', $chaves);
		$this->set('valores', $valores);

		$this->set('widgetContent', $widgetContent);

	}

}
