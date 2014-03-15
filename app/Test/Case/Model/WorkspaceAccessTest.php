<?php

App::uses('WorkspaceAccess', 'Model');

class WorkspaceAccessTest extends CakeTestCase {

    public $fixtures = array(
        'app.companies_user'
    );

    public function setUp() {
        parent::setUp();
        $this->WorkspaceAccess = ClassRegistry::init('WorkspaceAccess');
    }

    public function tearDown() {
        unset($this->WorkspaceAccess);

        parent::tearDown();
    }

    public function testFindCount() {
        $this->assertEqual($this->WorkspaceAccess->find('count', array('recursive' => -1)), 3);
    }
    
    public function testFindFirst() {
        $user = $this->WorkspaceAccess->find('first', array('recursive' => -1));
        $this->assertEqual($user['WorkspaceAccess']['user_id'], 1);
    }    
    
    public function testGetCompaniesByUser() {
        $companies = $this->WorkspaceAccess->getCompaniesByUser(1);
        $this->assertEqual($companies[0], 1);
        $this->assertEqual($companies[1], 2);
        $this->assertEqual($companies[2], 3);
    }

}
