<?php

App::uses('DocumentDataCopyStrategy', 'Lib/DataCopyStrategy');
App::uses('InvoiceFromOrderDataReader', 'Lib/DataReader');
App::uses('TaxDataReader', 'Lib/DataReader');

class InvoiceFromOrderDataCopyStrategy extends DocumentDataCopyStrategy {
    
    protected function copy() {
        $this->appendData(new InvoiceFromOrderDataReader($this->params));
        $this->appendData(new TaxDataReader(array('client_id' => $this->data['Document.client_id'])));
    }

}
