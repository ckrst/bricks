<?php

App::uses('AppModel', 'Model');


class User extends AppModel {

	public $useTable = 'user';
	public $order = 'username';
	public $displayField = 'username';

	/*
	public $validate = array(
		'username' => 'required',
        'password' => 'required',
        'email' => 'required'
	);
	*/
	
	public $hasMany = array(
		'UserApp' => array(
			'className' => 'UserApp',
			'foreignKey' => 'owner_id'
		)
	);



	public function beforeSave($options = array()) {
		if (!empty($this->data['User']['password'])) {
			$passwordHasher = new SimplePasswordHasher(array('hashType' => 'sha256'));
			$this->data['User']['password'] = $passwordHasher->hash(
				$this->data['User']['password']
			);
		}
		return true;
	}
}
