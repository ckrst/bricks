<?php

App::uses('AppModel', 'Model');

class Chave extends AppModel {

	public $useTable = 'chave';
	
	public $belongsTo = 'Objeto';
	public $hasMany = 'Valor';
	
}
