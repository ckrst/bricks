<?php

App::uses('AppModel', 'Model');

class Valor extends AppModel {

	public $useTable = 'valor';
	public $displayField = 'valor_campo';
	
	public $belongsTo = array('Campo', 'Chave');
	
}
