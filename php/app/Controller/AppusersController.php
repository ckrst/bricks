<?php
class UserappsController extends AppController {

	public $uses = array('User', 'UserApp', 'Mashup', 'Objeto', 'Campo', 'Widget');
	public $components = array('Auth', 'Session');

	public $helpers = array('Form', 'Html');

	function beforeFilter() {
		parent::beforeFilter();

		$this->set('menu', 'apps');
	}

	public function index() {
		$apps = $this->UserApp->find('all', array('conditions' => array('owner_id' => $this->Auth->user('id'))));
		$this->set('apps', $apps);
	}
