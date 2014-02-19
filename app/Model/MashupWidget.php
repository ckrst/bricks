<?php

App::uses ('AppModel', 'Model');

class MashupWidget extends AppModel {

	public $useTable = 'mashup_widget_xref';

	public $belongsTo = array(
			'Widget' => array(
					'className' => 'Widget',
					'foreignKey' => 'widget_id',
					'conditions' => '',
					'fields' => '',
					'order' => ''
			),
			'Mashup' => array(
					'className' => 'Mashup',
					'foreignKey' => 'mashup_id',
					'conditions' => '',
					'fields' => '',
					'order' => ''
			)
	);

}