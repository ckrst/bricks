<?php

/**
 * Arquivo DashboardController.php
 *
 * @author Vinícius Kirst <vinicius.kirst@gmail.com.br>
 */

App::uses('AppController', 'Controller');

class DashboardController extends AppController {

	public $uses = array('User');
	public $components = array('Auth');

	public $helpers = array('Form', 'Html');
	
	function beforeFilter() {
		parent::beforeFilter();
	}
	
	public function index() {
		
		
	}
	
}

