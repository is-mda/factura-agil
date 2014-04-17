<?php

App::uses('AppModel', 'Model');

class DocumentItem extends AppModel {

    public $belongsTo = array(
        'Document'
    );
    public $virtualFields = array(
        'amount' => 'DocumentItem.item_quantity * DocumentItem.item_price'
    );

}
