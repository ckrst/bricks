<?php

App::uses('AppModel', 'Model');

class Widget extends AppModel {

	public $useTable = 'widget';
	
	public $belongsTo = 'Objeto';

	function getObjeto($widget) {
		if ($widget['Widget']['objeto_id']) {
			$objeto = $this->Objeto->read(null, $widget['Widget']['objeto_id']);
			return $objeto;
		}
		return false;
	}
}