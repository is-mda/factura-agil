<?php

App::uses('AppModel', 'Model');

class DocumentItem extends AppModel {

    public $belongsTo = array(
        'Document'
    );
    public $virtualFields = array(
        'amount' => 'DocumentItem.quantity * DocumentItem.price'
    );

}
