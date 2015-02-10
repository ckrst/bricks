<?php

/**
 * Arquivo DashboardController.php
 *
 * @author Vinícius Kirst <vinicius.kirst@gmail.com.br>
 */

App::uses('AppController', 'Controller');

class DashboardController extends AppController {

	public $uses = array('User', 'UserApp', 'Mashup', 'Objeto', 'Campo', 'Widget');
	public $components = array('Auth');

	public $helpers = array('Form', 'Html');
	
	function beforeFilter() {
		parent::beforeFilter();

		$this->set('menu', 'dashboard');
	}
	
	public function index() {
		$this->set('objects', $this->Objeto->find('count'));
		$this->set('widgets', $this->Widget->find('count'));
		$this->set('users', $this->User->find('count'));
		
	}
	
}

