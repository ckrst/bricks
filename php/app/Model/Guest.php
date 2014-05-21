<?php

App::uses('AppModel', 'Model');

class Guest extends AppModel {

	public $useTable = 'guest';

	public $hasMany = 'Campo';

	public $belongsTo = array('User', 'UserApp');
}
