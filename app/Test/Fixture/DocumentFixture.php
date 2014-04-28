<?php

class DocumentFixture extends CakeTestFixture {

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
        'document_date' => array('type' => 'date', 'null' => false, 'default' => null),
        'code' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 15, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
        'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
        'indexes' => array(
            'PRIMARY' => array('column' => 'id', 'unique' => 1)
        ),
        'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
    );
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
            'document_date' => '2014-04-23',
            'code' => 'INV/000001',
            'created' => '2014-04-23 16:30:34',
            'modified' => '2014-04-23 16:30:34'
        ),
        array(
            'id' => 2,
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
            'document_date' => '2014-04-23',
            'code' => 'ORD/000001',
            'created' => '2014-04-23 16:30:34',
            'modified' => '2014-04-23 16:30:34'
        ),
    );

}
