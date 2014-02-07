<?php

App::uses('AppModel', 'Model');

class Campo extends AppModel {

	public $useTable = 'campo_objeto';
	public $order = 'ordem';
	public $displayField = 'nome';
	
	public $belongsTo = 'Objeto';
	
}
