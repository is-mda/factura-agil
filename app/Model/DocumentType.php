<?php

App::uses('AppModel', 'Model');

abstract class DocumentType extends AppModel {

    public $belongsTo = array(
        'Document'
    );
    
    abstract protected function getCopyStrategy($params);
    
    public function prepareData($params) {
        return $this->getCopyStrategy($params)->getData();
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
