<?php

App::uses('DocumentType', 'Model');
App::uses('DeliveryDataCopyStrategy', 'Lib/DataCopyStrategy');

class Order extends DocumentType {
    
    public $belongsTo = array(
        'Document',
        'DeliveryAddress'
    );    
    
    protected function getCopyStrategy($params) {
        return new DeliveryDataCopyStrategy($params);
    }

    protected function getCopyFromOrderStrategy($params) {
        throw new CakeException(__('Copy order from order is not allowed'));
    }

}