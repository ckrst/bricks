<?php

App::uses('AppModel', 'Model');

class Mashup extends AppModel {

	public $useTable = 'mashup';

	public $belongsTo = array(
		'UserApp' => array(
			'className' => 'UserApp',
			'foreignKey' => 'app_id'
		)
	);

	public $hasAndBelongsToMany = array(
        'Widget' =>
            array(
                'className' => 'Widget',
                'joinTable' => 'mashup_widget_xref',
                'foreignKey' => 'mashup_id',
                'associationForeignKey' => 'widget_id'
            )
    );
}
