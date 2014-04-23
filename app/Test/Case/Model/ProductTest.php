<?php

App::uses('Product', 'Model');

class ProductTest extends CakeTestCase {

    public $fixtures = array(
        'app.product'
    );

    public function setUp() {
        parent::setUp();
        $this->Product = ClassRegistry::init('Product');
    }

    public function testFindCount() {
        $this->assertEqual($this->Product->find('count', array('recursive' => 0)), 1);
    }

    public function testFindFirst() {
        $product = $this->Product->find('first', array('recursive' => 0));
        $this->assertEqual($product['Product']['name'], 'iPod shuffle 2Gb');
    }

    public function tearDown() {
        unset($this->Product);
        parent::tearDown();
    }

}
