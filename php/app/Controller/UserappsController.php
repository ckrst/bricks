<?php

/**
 * Arquivo UsersController.php
*
* @author Vinícius Kirst <vinicius@versul.com.br>
*/

App::uses('AppController', 'Controller');

class UserappsController extends AppController {

	public $uses = array('User', 'UserApp');
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
		
	}
	
	public function edit($id) {
		$userapp = $this->UserApp->findById($id);
		$this->set('userapp', $userapp);
	}

}