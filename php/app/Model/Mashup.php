<?php

App::uses('AppModel', 'Model');

class Mashup extends AppModel {

	public $useTable = 'mashup';

	public $belongsTo = array(
		'UserApp' => array(
			'className' => 'UserApp',
			'foreignKey' => 'app_id'
		)
	);
}
