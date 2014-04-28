<?php

App::uses('Order', 'Model');

class OrderTest extends CakeTestCase {

    public $fixtures = array(
        'app.document',
        'app.order',
        'app.company',
        'app.client',
        'app.delivery_address'        
    );

    public function setUp() {
        parent::setUp();
        $this->Order = ClassRegistry::init('Order');
        $this->Client = ClassRegistry::init('Client');
        $this->Company = ClassRegistry::init('Company');
        $this->DeliveryAddress = ClassRegistry::init('DeliveryAddress');
    }

    public function testPrepareData() {
        $data = $this->Order->prepareData(1, 1);
        $this->Client->id = 1;
        $this->assertEqual($data['Document']['client_name'], $this->Client->field('name'));
        $this->assertEqual($data['Document']['client_fiscal_code'], $this->Client->field('fiscal_code'));
        
        $deliveryAddresss = $this->DeliveryAddress->findByClientId($this->Client->id);
        $this->assertEqual($data['DeliveryAddress']['address'], $deliveryAddresss['DeliveryAddress']['address']);
        
        $this->Company->id = 1;
        $this->assertEqual($data['Document']['code'], 'ORD/000002');
        $this->assertEqual($data['Document']['company_name'], $this->Company->field('name'));
        $this->assertEqual($data['Document']['company_fiscal_code'], $this->Company->field('fiscal_code'));
    }

    public function tearDown() {
        unset($this->Order);
        parent::tearDown();
    }

}
