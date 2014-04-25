<?php

App::uses('DocumentType', 'Model');
App::uses('InvoiceDataCopyStrategy', 'Lib/DataCopyStrategy');
App::uses('InvoiceFromOrderDataCopyStrategy', 'Lib/DataCopyStrategy');

class Invoice extends DocumentType {
    
    protected function getCopyStrategy($params) {
        return new InvoiceDataCopyStrategy($params);
    }

    protected function getCopyFromOrderStrategy($params) {
        return new InvoiceFromOrderDataCopyStrategy($params);
    }

}
