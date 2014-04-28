<?php

App::uses('AppModel', 'Model');
App::uses('DocumentCodeGenerator', 'Lib/Document');

abstract class DocumentType extends AppModel {

    public $belongsTo = array(
        'Document'
    );
    
    abstract protected function getCopyStrategy($params);
    abstract protected function getCopyFromOrderStrategy($params);
    
    private function setNextCode($data) {
        return Hash::insert($data, 'Document.code', DocumentCodeGenerator::generateCode($this));      
    }
    
    public function prepareData($clientId, $companyId) {
        $data = $this->getCopyStrategy(array(
            'client_id' => $clientId, 
            'company_id' => $companyId
        ))->getData();
        return $this->setNextCode($data);
    }    
    
    public function prepareDataFromOrder($orderId) {
        $data = $this->getCopyFromOrderStrategy(array(
            'order_id' => $orderId
        ))->getData();
        return $this->setNextCode($data);
    }
    
    public function deleteDocument() {
        $this->getDataSource()->begin();
        $this->Document->id = $this->field('document_id');
        if(!$this->delete() or !$this->Document->delete()) {
            $this->getDataSource()->rollback();
            return false;
        }
        $this->getDataSource()->commit();
        return true;
    }
    
    public function saveDocument($data) {
        if($data[$this->alias]['id']) $this->Document->deleteNonExistentLines($data);
        return $this->saveAssociated($data, array('deep' => true));
    }
    
}
