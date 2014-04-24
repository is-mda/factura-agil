<?php

App::uses('DataReader', 'Lib/DataReader');

class ClientDataReader extends DataReader {

    protected $uses = array('Client');
    private static $cache = array();

    protected function getClient() {
        if (empty(self::$cache[$this->params['client_id']])) {
            if (!$this->Client->exists($this->params['client_id']))
                throw new NotFoundException(__('Invalid client'));
            self::$cache[$this->params['client_id']] = $this->Client->find('first', array('conditions' => array('Client.' . $this->Client->primaryKey => $this->params['client_id'])));
        }
        return self::$cache[$this->params['client_id']];
    }

    protected function read() {
        $data = $this->getClient();
        return $this->extractFields($data['Client'], array('id', 'name', 'fiscal_code', 'address', 'country'), 'client_');
    }

}
