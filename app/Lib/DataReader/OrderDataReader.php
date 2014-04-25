<?php

App::uses('DataReader', 'Lib/DataReader');

class OrderDataReader extends DataReader {
    
    protected $namespace = null;
    
    protected $uses = array('Order');
    
    protected function removeUnwantedDocumentData($data) {
        $data = Hash::remove($data, 'Document.id');
        $data = Hash::remove($data, 'Document.code');
        $data = Hash::remove($data, 'Document.document_date');
        return $data;
    }
    
    protected function removeUnwantedOrderData($data) {
        return Hash::remove($data, 'Order');
    }
    
    protected function removeUnwantedDocumentItemData($data) {
        $data = Hash::remove($data, 'Document.DocumentItem.{n}.id');
        $data = Hash::remove($data, 'Document.DocumentItem.{n}.document_id');
        return $data;
    }
    
    protected function getOrder() {
        $options = array('conditions' => array('Order.' . $this->Order->primaryKey => $this->params['order_id']), 'recursive' => 2);
        return $this->Order->find('first', $options);
    }
    
    protected function filterData($data) {
        $data = $this->removeUnwantedDocumentData($data);
        $data = $this->removeUnwantedOrderData($data);
        $data = $this->removeUnwantedDocumentItemData($data);
        return $data;
    }
    
    protected function read() {
        $data = $this->getOrder();
        return $this->filterData($data);
    }

}
