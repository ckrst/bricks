<?php

App::uses('AppModel', 'Model');

class Mashup extends AppModel {

	public $useTable = 'mashup';
	public $order = 'nome';
	public $displayField = 'nome';

	public $belongsTo = array(
		'App' => array(
			'className' => 'App',
			'foreignKey' => 'app_id'
		)
	);
 	
}