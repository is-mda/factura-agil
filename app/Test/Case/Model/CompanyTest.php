<?php

App::uses('Company', 'Model');

class CompanyTest extends CakeTestCase {

    public $fixtures = array(
        'app.company'
    );

    public function setUp() {
        parent::setUp();
        $this->Company = ClassRegistry::init('Company');
    }

    public function testFindCount() {
        $this->assertEqual($this->Company->find('count', array('recursive' => 0)), 3);
    }

    public function testFindFirst() {
        $company = $this->Company->find('first', array('recursive' => 0));
        $this->assertEqual($company['Company']['fiscal_code'], '466743AA');
    }

    public function tearDown() {
        unset($this->Company);
        parent::tearDown();
    }

}
