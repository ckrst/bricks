<?php

/**
 * Arquivo ObjetosController.php
*
* @author Vinícius Kirst <vinicius@versul.com.br>
*/

App::uses('AppController', 'Controller');

class RegisterController extends AppController {

	public $uses = array('User');

	public $helpers = array('Form', 'Html');
	
	public $components = array('Auth');	
	
	
	
	
}

