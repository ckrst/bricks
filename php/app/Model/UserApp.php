<?php

App::uses('AppModel', 'Model');

class UserApp extends AppModel {

	public $useTable = 'app';
	public $order = 'nome';
	public $displayField = 'nome';
	
	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'owner_id'
		)
	);

	public $hasMany = array(
		'Mashup' => array(
			'className' => 'Mashup',
			'foreignKey' => 'app_id'
		),
		'Objeto' => array(
			'className' => 'Objeto',
			'foreignKey' => 'app_id'
		),
		'Guest' => array(
			'className' => 'Guest',
			'foreignKey' => 'app_id'
		)
	);
}
