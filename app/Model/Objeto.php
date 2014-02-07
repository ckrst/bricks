<?php

App::uses('AppModel', 'Model');

class Objeto extends AppModel {

	public $useTable = 'objeto';
	public $order = 'nome';
	public $displayField = 'nome';
	
	public $hasMany = 'Campo';
}
