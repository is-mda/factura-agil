<?php

App::uses('ClientDataReader', 'Lib/DataReader');

class DeliveryAddressDataReader extends ClientDataReader {
    
    protected $namespace = 'DeliveryAddress';
    
    protected function read() {
        $data = $this->getClient();
        return $data['DeliveryAddress'];
    }
    
}
