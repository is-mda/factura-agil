<?php
App::uses('AppModel', 'Model');

class Document extends AppModel {
    
    public $belongsTo = array(
        'Company', 
        'Client'
    );
    
    public $hasMany = array(
        'DocumentItem'
    );
    
    public function deleteNonExistentLines($data) {
        $conditions = array('document_id' => $data['Document']['id']);
        if (!empty($data['Document']['DocumentItem'])) {
            $conditions['NOT'] = array(
                'DocumentItem.id' => Hash::extract($data, 'Document.DocumentItem.{n}.id')
            );
        }
        $this->DocumentItem->deleteAll($conditions);
    }

}
