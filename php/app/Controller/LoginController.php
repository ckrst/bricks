<?php

/**
 * Arquivo ObjetosController.php
*
* @author Vinícius Kirst <vinicius@versul.com.br>
*/

App::uses('AppController', 'Controller');

class LoginController extends AppController {

	public $uses = array('User');

	public $helpers = array('Form', 'Html');
	
	// Pass settings in $components array
	public $components = array(
		'Auth' => array(
			'loginAction' => array(
				'controller' => 'login'
			),
			'authError' => 'Did you really think you are allowed to see that?',
			'authenticate' => array(
				'Form' => array(
					'fields' => array('username' => 'username'),
					'passwordHasher' => array(
						'className' => 'Simple',
						'hashType' => 'md5'
					)
				)
			)
		)
	);
	
	public function index() {
		if ($this->request->is('post')) {
			if ($this->Auth->login()) {
				return $this->redirect($this->Auth->redirectUrl());
			} else {
				$this->Session->setFlash(
					__('Username or password is incorrect'),
					'flash_error'
				);
			}
		}
	}
	

}

