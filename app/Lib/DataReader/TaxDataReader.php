<?php

App::uses('ClientDataReader', 'Lib/DataReader');

class TaxDataReader extends ClientDataReader {
    
    protected $namespace = 'Invoice';
    
    protected function read() {
        $data = $this->getClient();
        return $this->extractFields($data['Client'], array('tax_rate'), 'client_');
    }

    
}
