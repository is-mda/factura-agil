<?php

App::uses('DataReader', 'Lib/DataReader');

class CompanyDataReader extends DataReader {
    
    protected $uses = array('Company');
    
    protected function getCompany() {
        if (!$this->Company->exists($this->params['company_id']))
            throw new NotFoundException(__('Invalid company'));
        return $this->Company->find('first', array('conditions' => array('Company.' . $this->Company->primaryKey => $this->params['company_id'])));        
    }
    
    protected function read() {
        $data = $this->getCompany();
        return $this->extractFields($data['Company'], array('id', 'name', 'fiscal_code', 'address', 'country'), 'company_');
    }

}
