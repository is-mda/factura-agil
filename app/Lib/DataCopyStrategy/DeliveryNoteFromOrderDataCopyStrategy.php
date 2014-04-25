<?php

App::uses('DocumentDataCopyStrategy', 'Lib/DataCopyStrategy');
App::uses('DeliveryNoteFromOrderDataReader', 'Lib/DataReader');

class DeliveryNoteFromOrderDataCopyStrategy extends DocumentDataCopyStrategy {
    
    protected function copy() {
        $this->appendData(new DeliveryNoteFromOrderDataReader($this->params));
    }

}
