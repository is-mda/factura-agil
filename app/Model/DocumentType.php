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
    
}
