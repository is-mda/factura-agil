<?php

App::uses('DocumentDataCopyStrategy', 'Lib/DataCopyStrategy');
App::uses('CompanyDataReader', 'Lib/DataReader');
App::uses('ClientDataReader', 'Lib/DataReader');
App::uses('DeliveryAddressDataReader', 'Lib/DataReader');

class DeliveryDataCopyStrategy extends DocumentDataCopyStrategy {
    
    protected function copy() {
        $this->appendData(new CompanyDataReader($this->params));
        $this->appendData(new ClientDataReader($this->params));
        $this->appendData(new DeliveryAddressDataReader($this->params));
    }

}
