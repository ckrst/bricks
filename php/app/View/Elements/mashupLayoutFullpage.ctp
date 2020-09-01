<?php

//die(var_dump($mashupWidgets));


foreach ($mashupWidgets as $index => $mashupWidget) {
	switch (intval($mashupWidget['Widget']['tipo'])) {
		case WIDGET_TIPO_TABELA:
			$widgetContent = 'widget_tabela';
			break;
		case WIDGET_TIPO_BUTTON_POPUP_INSERTER:
			$widgetContent = 'widget_btn_popup_inserter';
			break;
		default:
			break;
	}

	echo $this->element($widgetContent, array('objeto'=> $objetos[$index], 'widget' => $mashupWidget, 'campos' => $campos[$index], 'chaves' => $chaves[$index], 'valores' => $valores[$index]));
}
