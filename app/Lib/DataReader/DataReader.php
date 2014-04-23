<?php

abstract class DataReader {
    
    protected $uses = array();
    
    protected $namespace = 'Document';
    
    protected $params = array();
    
    public function __construct($params = array()) {
        $this->params = $params;
        if(!empty($this->uses)) {
            foreach($this->uses as $model) {
                $this->loadModel($model);
            }
        }
    }
    
    protected function loadModel($model) {
        $this->$model = ClassRegistry::init($model);
    }
    
    protected function extractFields($data, $fields, $prefix) {
        $result = array();
        foreach ($fields as $field) {
            $result[$prefix . $field] = $data[$field];
        }
        return $result;
    }
    
    public function getData() {
        $data = $this->read();
        return Hash::flatten(!empty($this->namespace) ? array($this->namespace => $data) : $data);
    }
    
    abstract protected function read();
    
}
