<?php

class CompaniesUserFixture extends CakeTestFixture {

    public $fields = array(
        'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
        'user_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
        'company_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
        'indexes' => array(
            'PRIMARY' => array('column' => 'id', 'unique' => 1)
        ),
        'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
    );
    public $records = array(
        array(
            'id' => 1,
            'user_id' => 1,
            'company_id' => 1
        ),
        array(
            'id' => 2,
            'user_id' => 1,
            'company_id' => 2
        ),
        array(
            'id' => 3,
            'user_id' => 1,
            'company_id' => 3
        ),
    );

}
