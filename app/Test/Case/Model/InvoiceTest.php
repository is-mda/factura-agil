<?php

App::uses('Invoice', 'Model');

class InvoiceTest extends CakeTestCase {

    public $fixtures = array(
        'app.invoice',
        'app.company',
        'app.client'
    );

    public function setUp() {
        parent::setUp();
        $this->Invoice = ClassRegistry::init('Invoice');
        $this->Client = ClassRegistry::init('Client');
        $this->Company = ClassRegistry::init('Company');
    }

    public function testPrepareData() {
        $data = $this->Invoice->prepareData(array('client_id' => 1, 'company_id' => 1));
        $this->Client->id = 1;
        $this->assertEqual($data['Document']['client_name'], $this->Client->field('name'));
        $this->assertEqual($data['Document']['client_fiscal_code'], $this->Client->field('fiscal_code'));
        $this->assertEqual($data['Invoice']['tax_rate'], $this->Client->field('tax_rate'));
        $this->Company->id = 1;
        $this->assertEqual($data['Document']['company_name'], $this->Company->field('name'));
        $this->assertEqual($data['Document']['company_fiscal_code'], $this->Company->field('fiscal_code'));
        
    }
    
    public function tearDown() {
        unset($this->Invoice);
        parent::tearDown();
    }

}
