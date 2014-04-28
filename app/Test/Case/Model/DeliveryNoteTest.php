<?php

App::uses('DeliveryNote', 'Model');

class DeliveryNoteTest extends CakeTestCase {

    public $fixtures = array(
        'app.document',
        'app.delivery_note',
        'app.company',
        'app.client',
        'app.delivery_address',
        'app.document_item'
    );

    public function setUp() {
        parent::setUp();
        $this->DeliveryNote = ClassRegistry::init('DeliveryNote');
        $this->Client = ClassRegistry::init('Client');
        $this->Company = ClassRegistry::init('Company');
        $this->DeliveryAddress = ClassRegistry::init('DeliveryAddress');
    }

    public function testPrepareData() {
        $data = $this->DeliveryNote->prepareData(1, 1);
        $this->Client->id = 1;
        $this->assertEqual($data['Document']['client_name'], $this->Client->field('name'));
        $this->assertEqual($data['Document']['client_fiscal_code'], $this->Client->field('fiscal_code'));
        
        $deliveryAddresss = $this->DeliveryAddress->findByClientId($this->Client->id);
        $this->assertEqual($data['DeliveryAddress']['address'], $deliveryAddresss['DeliveryAddress']['address']);
        
        $this->Company->id = 1;
        $this->assertEqual($data['Document']['code'], 'DEL/000002');
        $this->assertEqual($data['Document']['company_name'], $this->Company->field('name'));
        $this->assertEqual($data['Document']['company_fiscal_code'], $this->Company->field('fiscal_code'));
    }    

    public function tearDown() {
        unset($this->DeliveryNote);
        parent::tearDown();
    }

}
