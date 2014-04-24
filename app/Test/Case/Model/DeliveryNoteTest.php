<?php

App::uses('DeliveryNote', 'Model');

class DeliveryNoteTest extends CakeTestCase {

    public $fixtures = array(
        'app.delivery_note',
        'app.document',
        'app.company',
        'app.client',
        'app.delivery_address',
        'app.document_item'
    );

    public function setUp() {
        parent::setUp();
        $this->DeliveryNote = ClassRegistry::init('DeliveryNote');
    }

    public function tearDown() {
        unset($this->DeliveryNote);
        parent::tearDown();
    }

}
