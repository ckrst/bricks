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

	function getWidgetContent($widget) {
		switch (intval($widget['Widget']['tipo'])) {
			case WIDGET_TIPO_TABELA:
				$widgetContent = 'widget_tabela';
				break;
			case WIDGET_TIPO_BUTTON_POPUP_INSERTER:
				$widgetContent = 'widget_btn_popup_inserter';
				break;
			default:
				break;
		}
	}
}
