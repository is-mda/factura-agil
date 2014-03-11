<?php
/**
 * InvoiceFixture
 *
 */
class InvoiceFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'company_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'company_name' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'company_fiscal_code' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'company_address' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'company_country' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 2, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'client_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'client_name' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'client_fiscal_code' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'client_address' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'client_country' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 2, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'invoice_date' => array('type' => 'date', 'null' => false, 'default' => null),
		'gross_amount' => array('type' => 'float', 'null' => false, 'default' => null),
		'tax_rate' => array('type' => 'float', 'null' => false, 'default' => null),
		'tax_amount' => array('type' => 'float', 'null' => false, 'default' => null),
		'net_amount' => array('type' => 'float', 'null' => false, 'default' => null),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
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
			'company_id' => 1,
			'company_name' => 'Lorem ipsum dolor sit amet',
			'company_fiscal_code' => 'Lorem ipsum dolor sit amet',
			'company_address' => 'Lorem ipsum dolor sit amet',
			'company_country' => '',
			'client_id' => 1,
			'client_name' => 'Lorem ipsum dolor sit amet',
			'client_fiscal_code' => 'Lorem ipsum dolor sit amet',
			'client_address' => 'Lorem ipsum dolor sit amet',
			'client_country' => '',
			'invoice_date' => '2014-03-11',
			'gross_amount' => 1,
			'tax_rate' => 1,
			'tax_amount' => 1,
			'net_amount' => 1,
			'created' => '2014-03-11 00:08:28',
			'modified' => '2014-03-11 00:08:28'
		),
	);

}
