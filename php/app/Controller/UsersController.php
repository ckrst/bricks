<?php

/**
 * Arquivo UsersController.php
*
* @author Vinícius Kirst <vinicius@versul.com.br>
*/

App::uses('AppController', 'Controller');

class UsersController extends AppController {

	public $uses = array('User');
	public $components = array('Auth', 'Session');

	public $helpers = array('Form', 'Html');

	function beforeFilter() {
		parent::beforeFilter();

		$this->Auth->allow('register');
	}

	public function login() {

		if ($this->request->is('post')) {


			$username = $this->request->data('username');
			$password = $this->request->data('password');

			$user = $this->User->find('first', array('conditions' => array('username' => $username, 'password' => md5($password))));

			if ($this->Auth->login($user['User'])) {
				return $this->redirect('/dashboard');
			} else {
				$this->Session->setFlash(
					__('Username or password is incorrect'),
					'flash_error'
				);
			}
		}
	}


	public function register() {
		if ($this->request->is('post')) {
			$email = $this->request->data('email');
			$username = $this->request->data('username');
			$password = $this->request->data('password');

			$user = array(
				'User' => array(
					'email' 	=> $email,
					'username' 	=> $username,
					'password' 	=> $password
				)
			);

			$this->User->create();
			if ($this->User->save($user)) {
				$user['User']['id'] = $this->User->id;
				$this->Auth->login($user['User']);
				return $this->redirect('/dashboard');
			} else {

				$this->Session->setFlash(
					__('Ops'),
					'flash_error'
				);
			}
		}

	}

	public function logout() {
		return $this->redirect($this->Auth->logout());
	}

}
