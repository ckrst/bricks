<?php

class WidgetsControllerTest extends ControllerTestCase {
    #public $fixtures = array('app.UserApp');

    public function testIndex() {
        $result = $this->testAction('/widgets/index/?format=json&objeto_id=' . 1);

        $this->assertNotNull($result);

        debug($result);
    }


}
