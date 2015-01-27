<?php

/**
 * Arquivo UsersController.php
*
* @author Vinícius Kirst <vinicius@versul.com.br>
*/

App::uses('AppController', 'Controller');

class UserappsController extends AppController {

	public $uses = array('User', 'UserApp', 'Mashup', 'Objeto', 'Campo');
	public $components = array('Auth', 'Session');

	public $helpers = array('Form', 'Html');

	function beforeFilter() {
		parent::beforeFilter();
	}

	public function index() {
		$apps = $this->UserApp->find('all', array('conditions' => array('owner_id' => $this->Auth->user('id'))));
		$this->set('apps', $apps);
	}

	public function add() {

		if ($this->request->is('post')) {
			$this->UserApp->create();
			$this->request->data['UserApp']['owner_id'] = $this->user['id'];
			$this->UserApp->save($this->request->data);
			$this->Mashup->create();
			$this->Mashup->save(array('Mashup' => array('nome' => 'default', 'layout' => 1, 'style' => 3, 'app_id' => $this->UserApp->id)));



			$this->redirect('/');

		}

		$this->set('userapp', array());
	}

	public function edit($id) {
		$userapp = $this->UserApp->findById($id);
		$this->set('userapp', $userapp);
	}

	public function run($id) {

		$userApp = $this->UserApp->findById($id);
		$this->set('userApp', $userApp);

	}

	public function view($id) {
		$userApp = $this->UserApp->findById($id);

		$objetos = $this->Objeto->find('all', array('conditions' => array('app_id' => $id), 'order' => 'nome'));

		$this->set('userApp', $userApp);
		$this->set('objetos', $objetos);
	}

	public function addObjeto() {
		if ($this->request->is('post')) {

			$userApp = $this->UserApp->findById($this->request->data['Objeto']['app_id']);

			//TODO validate app

			if ($this->Objeto->save($this->request->data)) {
	            // Set a session flash message and redirect.
    	        $this->Session->setFlash('Object Saved!');
        	    return $this->redirect('/userapps/view/' . $userApp['UserApp']['id']);
        	}

        	debug($this->Objeto->validationErrors);
		}
	}

	public function addCampo() {
		if ($this->request->is('post')) {

			$objeto = $this->Objeto->findById($this->request->data['Campo']['objeto_id']);

			//TODO validate objeto

			//$order = $this->Campo->nextOrder($objeto['Objeto']['id']);
			$order = $this->Campo->find('count', array('conditions' => array('objeto_id', $objeto['Objeto']['id'])));
			$this->request->data['Campo']['ordem'] = $order;

			if ($this->Campo->save($this->request->data)) {
	            // Set a session flash message and redirect.
    	        $this->Session->setFlash('Field Saved!');
        	    return $this->redirect('/userapps/view/' . $objeto['Objeto']['app_id']);
        	}

        	debug($this->Campo->validationErrors);
		}
	}

}
