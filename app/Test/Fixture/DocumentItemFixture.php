<?php

class DocumentItemFixture extends CakeTestFixture {

    public $fields = array(
        'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
        'code' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 13, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 150, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'quantity' => array('type' => 'integer', 'null' => false, 'default' => null),
        'price' => array('type' => 'float', 'null' => false, 'default' => null),
        'document_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
        'indexes' => array(
            'PRIMARY' => array('column' => 'id', 'unique' => 1)
        ),
        'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
    );
    public $records = array(
        array(
            'id' => 1,
            'code' => 'Lorem ipsum',
            'name' => 'Lorem ipsum dolor sit amet',
            'quantity' => 1,
            'price' => 1,
            'document_id' => 1
        )
    );

}
