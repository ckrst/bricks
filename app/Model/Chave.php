<?php

App::uses('AppModel', 'Model');

class Chave extends AppModel {

	public $useTable = 'chave';
	
	public $belongsTo = 'Objeto';
	public $hasMany = 'Valor';
	
	public function getValor($campoId)
	{
		return $this->Valor->find('first', array('conditions' => array('chave_id' => $this->id, 'campo_id' => $campoId)));
	}
	
}
