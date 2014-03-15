<?php

class ClientFixture extends CakeTestFixture {

    public $fields = array(
        'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
        'name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 200, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'fiscal_code' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 20, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'email' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 150, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'address' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 200, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'country' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 200, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'phone' => array('type' => 'integer', 'null' => true, 'default' => null),
        'fax' => array('type' => 'integer', 'null' => true, 'default' => null),
        'postal_code' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10),
        'bank_account_number' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 34, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'tax_rate' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 3),
        'company_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
        'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
        'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
        'indexes' => array(
            'PRIMARY' => array('column' => 'id', 'unique' => 1)
        ),
        'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
    );
    public $records = array(
        array(
            'id' => '1',
            'name' => 'Samsung, CIA',
            'fiscal_code' => '8774666hhty',
            'email' => 'support@samsung.com',
            'address' => 'Street, 69',
            'country' => 'US',
            'phone' => null,
            'fax' => null,
            'postal_code' => null,
            'bank_account_number' => '',
            'tax_rate' => '12',
            'company_id' => '3',
            'created' => '2014-03-15 11:47:53',
            'modified' => '2014-03-15 11:47:53'
        ),
        array(
            'id' => '2',
            'name' => 'Correos España, S.A.',
            'fiscal_code' => '88477yyru',
            'email' => 'soporte@correo.es',
            'address' => 'C/ Anabel Segura, 11',
            'country' => 'ES',
            'phone' => null,
            'fax' => null,
            'postal_code' => null,
            'bank_account_number' => '',
            'tax_rate' => '10',
            'company_id' => '4',
            'created' => '2014-03-15 12:42:07',
            'modified' => '2014-03-15 12:42:07'
        ),
        array(
            'id' => '3',
            'name' => 'West Fargo, CIA',
            'fiscal_code' => '8774666hhty',
            'email' => 'client@client.com',
            'address' => 'Second Street',
            'country' => 'US',
            'phone' => null,
            'fax' => null,
            'postal_code' => null,
            'bank_account_number' => '',
            'tax_rate' => '11',
            'company_id' => '4',
            'created' => '2014-03-15 12:47:43',
            'modified' => '2014-03-15 12:47:43'
        ),
    );

}
