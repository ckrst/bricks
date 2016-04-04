<?php

class WidgetsControllerTest extends ControllerTestCase {
    public $fixtures = array('app.team');

    public function testIndex() {
        $result = $this->testAction('/widgets/index');
        debug($result);
    }


}
