<?php

class CompanyFixture extends CakeTestFixture {

    public $fields = array(
        'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
        'name' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'fiscal_code' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'address' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'country' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 2, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
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
            'name' => 'Apple, Inc',
            'fiscal_code' => '466743AA',
            'address' => 'Main Street, 28. New York',
            'country' => 'US',
            'created' => '2014-03-15 11:39:36',
            'modified' => '2014-03-15 11:39:36'
        ),
        array(
            'id' => 2,
            'name' => 'West Fargo, CIA',
            'fiscal_code' => '77466uuej',
            'address' => 'Oxford Street, 78',
            'country' => 'US',
            'created' => '2014-03-15 11:44:20',
            'modified' => '2014-03-15 11:44:20'
        ),
        array(
            'id' => 3,
            'name' => 'Fake company, CIA',
            'fiscal_code' => '8877YY3YUU3',
            'address' => 'C/ Plaza de la Feria, 42a P7',
            'country' => 'ES',
            'created' => '2014-03-15 12:06:54',
            'modified' => '2014-03-15 12:06:54'
        ),
    );

}
