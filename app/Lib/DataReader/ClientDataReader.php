<?php

App::uses('DataReader', 'Lib/DataReader');

class ClientDataReader extends DataReader {
    
    protected $uses = array('Client');
    
    protected function getClient() {
        if (!$this->Client->exists($this->params['client_id']))
            throw new NotFoundException(__('Invalid client'));
        return $this->Client->find('first', array('conditions' => array('Client.' . $this->Client->primaryKey => $this->params['client_id'])));
    }
    
    protected function read() {
        $data = $this->getClient();
        return $this->extractFields($data['Client'], array('id', 'name', 'fiscal_code', 'address', 'country'), 'client_');
    }

}
