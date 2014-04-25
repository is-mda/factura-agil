<?php

App::uses('OrderDataReader', 'Lib/DataReader');

class DeliveryNoteFromOrderDataReader extends OrderDataReader {    
   
    protected function filterData($data) {
        $data['DeliveryNote'] = array(
          'delivery_date' => $data['Order']['estimated_delivery_date']
        );
        return parent::filterData($data);
    }

}

