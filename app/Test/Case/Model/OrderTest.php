<?php

App::uses('Order', 'Model');

class OrderTest extends CakeTestCase {

    public $fixtures = array(
        'app.order'
    );

    public function setUp() {
        parent::setUp();
        $this->Order = ClassRegistry::init('Order');
    }

    public function tearDown() {
        unset($this->Order);
        parent::tearDown();
    }

}
