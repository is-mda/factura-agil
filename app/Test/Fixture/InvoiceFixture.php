<?php

class InvoiceFixture extends CakeTestFixture {

    public $fields = array(
        'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
        'document_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
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
    public $records = array(
        array(
            'id' => 1,
            'document_id' => 1,
            'gross_amount' => 1,
            'tax_rate' => 1,
            'tax_amount' => 1,
            'net_amount' => 1,
            'created' => '2014-04-23 16:32:39',
            'modified' => '2014-04-23 16:32:39'
        )
    );

}
