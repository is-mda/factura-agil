<?php

App::uses('AppModel', 'Model');

class InvoiceLine extends AppModel {

    public $belongsTo = array(
        'Invoice' => array(
            'className' => 'Invoice',
            'foreignKey' => 'invoice_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );
    public $virtualFields = array(
        'amount' => 'InvoiceLine.item_quantity * InvoiceLine.item_price'
    );

}
