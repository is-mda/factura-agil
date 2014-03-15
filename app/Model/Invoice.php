<?php

App::uses('AppModel', 'Model');

class Invoice extends AppModel {

    public $belongsTo = array(
        'Company' => array(
            'className' => 'Company',
            'foreignKey' => 'company_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Client' => array(
            'className' => 'Client',
            'foreignKey' => 'client_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );
    public $hasMany = array(
        'InvoiceLine' => array(
            'className' => 'InvoiceLine',
            'foreignKey' => 'invoice_id',
            'dependent' => false,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        )
    );

    public function deleteNonExistentLines($data) {
        $conditions = array('invoice_id' => $data['Invoice']['id']);
        if (!empty($data['InvoiceLine'])) {
            $conditions['NOT'] = array(
                'InvoiceLine.id' => Hash::extract($data, 'InvoiceLine.{n}.id')
            );
        }
        $this->InvoiceLine->deleteAll($conditions);
    }

    public function prepareData($client, $company) {
        return array(
            'Invoice' => array_merge(
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
