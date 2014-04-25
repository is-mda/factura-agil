<?php

App::uses('OrderDataReader', 'Lib/DataReader');

class InvoiceFromOrderDataReader extends OrderDataReader {    
   
    protected function filterData($data) {
        return parent::filterData(Hash::remove($data, 'DeliveryAddress'));
    }

}