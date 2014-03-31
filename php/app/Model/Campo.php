<?php

App::uses('AppModel', 'Model');

class Campo extends AppModel {

	public $useTable = 'campo';
	public $order = 'ordem';
	public $displayField = 'nome';
	
	public $belongsTo = 'Objeto';
	public $hasMany = 'Valor';
	
}
