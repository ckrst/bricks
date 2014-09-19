<?php

/**
 * Arquivo UsersController.php
*
* @author Vinícius Kirst <vinicius@versul.com.br>
*/

App::uses('AppController', 'Controller');

class UserappsController extends AppController {

	public $uses = array('User', 'UserApp', 'Mashup');
	public $components = array('Auth');

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

}
