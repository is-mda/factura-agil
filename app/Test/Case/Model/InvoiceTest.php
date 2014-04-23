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
    }

    public function testPrepareData() {
        $data = $this->Invoice->prepareData(1, 3);
        $this->Invoice->Client->id = 1;        
        $this->assertEqual($data['Invoice']['client_name'], $this->Invoice->Client->field('name'));
        $this->assertEqual($data['Invoice']['client_fiscal_code'], $this->Invoice->Client->field('fiscal_code'));
        $this->assertEqual($data['Invoice']['tax_rate'], $this->Invoice->Client->field('tax_rate'));
        
        $this->Invoice->Company->id = 3;
        $this->assertEqual($data['Invoice']['company_name'], $this->Invoice->Company->field('name'));
        $this->assertEqual($data['Invoice']['company_fiscal_code'], $this->Invoice->Company->field('fiscal_code'));
        
    }
    
    public function tearDown() {
        unset($this->Invoice);

        parent::tearDown();
    }

}
