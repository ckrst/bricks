<?php

App::uses('AppModel', 'Model');


class User extends AppModel {

	public $useTable = 'user';
	public $order = 'username';
	public $displayField = 'username';
	
	public $components = array('Auth');

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
			$this->data['User']['password'] = md5($this->data['User']['password']);
		}
		return true;
	}
}
