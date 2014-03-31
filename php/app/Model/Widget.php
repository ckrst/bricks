<?php

App::uses('AppModel', 'Model');

class Widget extends AppModel {

	public $useTable = 'widget';
	
	public $belongsTo = 'Objeto';
}