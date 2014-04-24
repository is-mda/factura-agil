<?php

App::uses('DocumentDataCopyStrategy', 'Lib');
App::uses('CompanyDataReader', 'Lib/DataReader');
App::uses('ClientDataReader', 'Lib/DataReader');

class OrderDataCopyStrategy extends DocumentDataCopyStrategy {
    
    protected function copy() {
        $this->appendData(new CompanyDataReader($this->params));
        $this->appendData(new ClientDataReader($this->params));
    }

}
