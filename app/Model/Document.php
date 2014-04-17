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

    public function prepareData($client, $company) {
        return array(
            'Document' => array_merge(
                $this->prepareClientData($client), $this->prepareCompanyData($company)
            )
        );
    }

    private function extractFields($data, $fields, $prefix) {
        $result = array();
        foreach ($fields as $field) {
            $result[$prefix . $field] = $data[$field];
        }
        return $result;
    }

    private function prepareClientData($client) {
        if (!$this->Client->exists($client))
            throw new NotFoundException(__('Invalid client'));
        $data = $this->Client->find('first', array('conditions' => array('Client.' . $this->Client->primaryKey => $client)));
        return array_merge($this->extractFields($data['Client'], array('id', 'name', 'fiscal_code', 'address', 'country'), 'client_'), array('tax_rate' => $data['Client']['tax_rate']));
    }

    private function prepareCompanyData($company) {
        if (!$this->Company->exists($company))
            throw new NotFoundException(__('Invalid company'));
        $data = $this->Company->find('first', array('conditions' => array('Company.' . $this->Company->primaryKey => $company)));
        return $this->extractFields($data['Company'], array('id', 'name', 'fiscal_code', 'address', 'country'), 'company_');
    }    
}
