<?php

App::uses('AppModel', 'Model');

class Campo extends AppModel {

	public $useTable = 'campo';
	public $order = 'ordem';
	public $displayField = 'nome';
	
	public $belongsTo = 'Objeto';
	public $hasMany = 'Valor';

	public function nextOrder($objectId){
		return $this->query("SELECT id, ordem FROM campo WHERE objeto_id=" . $objectId . " ORDER BY ordem DESC");
	}
	
}
