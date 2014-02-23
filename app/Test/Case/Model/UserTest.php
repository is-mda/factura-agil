<?php
App::uses('User', 'Model');

class UserTest extends CakeTestCase {

    public $fixtures = array(
            'app.user'
    );

    public function setUp() {
        parent::setUp();
        $this->User = ClassRegistry::init('User');
    }

    public function testFindCount() {
        $this->assertEqual($this->User->find('count'), 1);
    }
    
    public function testFindFirst() {
        $user = $this->User->find('first');
        $this->assertEqual($user['User']['email'], 'johndoe@gmail.com');
    }
    
    public function tearDown() {
        unset($this->User);
        parent::tearDown();
    }

}
