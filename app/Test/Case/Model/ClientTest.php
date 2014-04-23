<?php

App::uses('Client', 'Model');

class ClientTest extends CakeTestCase {

    public $fixtures = array(
        'app.client'
    );

    public function setUp() {
        parent::setUp();
        $this->Client = ClassRegistry::init('Client');
    }

    public function testFindCount() {
        $this->assertEqual($this->Client->find('count', array('recursive' => 0)), 3);
    }

    public function testFindFirst() {
        $client = $this->Client->find('first', array('recursive' => 0));
        $this->assertEqual($client['Client']['fiscal_code'], '8774666hhty');
    }    
    
    public function tearDown() {
        unset($this->Client);

        parent::tearDown();
    }

}
