<?php

App::uses('DocumentType', 'Model');
App::uses('InvoiceDataCopyStrategy', 'Lib');

class Invoice extends DocumentType {
    
    protected function getCopyStrategy($params) {
        return new InvoiceDataCopyStrategy($params);
    }
    
}
