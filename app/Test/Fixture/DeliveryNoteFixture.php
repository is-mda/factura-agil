<?php

class DeliveryNoteFixture extends CakeTestFixture {

    public $fields = array(
        'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
        'document_id' => array('type' => 'integer', 'null' => false, 'default' => null),
        'delivery_address_id' => array('type' => 'integer', 'null' => false, 'default' => null),
        'delivery_date' => array('type' => 'date', 'null' => false, 'default' => null),
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
            'delivery_address_id' => 1,
            'delivery_date' => '2014-04-24',
            'created' => '2014-04-24 12:17:10',
            'modified' => '2014-04-24 12:17:10'
        ),
    );

}
