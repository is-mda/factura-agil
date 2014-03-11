<?php
/**
 * InvoiceLineFixture
 *
 */
class InvoiceLineFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'item_name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 150, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'item_quantity' => array('type' => 'integer', 'null' => false, 'default' => null),
		'item_price' => array('type' => 'float', 'null' => false, 'default' => null),
		'invoice_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'item_name' => 'Lorem ipsum dolor sit amet',
			'item_quantity' => 1,
			'item_price' => 1,
			'invoice_id' => 1
		),
	);

}
