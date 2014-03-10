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
        $this->assertEqual($this->Company->find('count'), 1);
    }

    public function testFindFirst() {
        $company = $this->Company->find('first');
        $this->assertEqual($company['Company']['name'], 'Fedex, CIA');
    }

    public function tearDown() {
        unset($this->Company);

        parent::tearDown();
    }

}
