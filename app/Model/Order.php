<?php

App::uses('DocumentType', 'Model');
App::uses('OrderDataCopyStrategy', 'Lib');

class Order extends DocumentType {
    
    protected function getCopyStrategy($params) {
        return new OrderDataCopyStrategy($params);
    }
    
}