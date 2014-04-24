<?php

App::uses('DocumentType', 'Model');
App::uses('DeliveryDataCopyStrategy', 'Lib');

class Order extends DocumentType {
    
    public $belongsTo = array(
        'Document',
        'DeliveryAddress'
    );    
    
    protected function getCopyStrategy($params) {
        return new DeliveryDataCopyStrategy($params);
    }
    
}