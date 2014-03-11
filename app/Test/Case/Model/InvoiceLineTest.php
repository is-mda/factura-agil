<?php
App::uses('InvoiceLine', 'Model');

/**
 * InvoiceLine Test Case
 *
 */
class InvoiceLineTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.invoice_line',
		'app.invoice',
		'app.company',
		'app.client'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->InvoiceLine = ClassRegistry::init('InvoiceLine');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->InvoiceLine);

		parent::tearDown();
	}

}
