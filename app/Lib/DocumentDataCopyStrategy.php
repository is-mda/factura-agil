<?php

abstract class DocumentDataCopyStrategy {
    
    protected $params = array();
    
    protected $data = array();
    
    public function __construct($params = array()) {
        $this->params = $params;
    }    
    
    protected function appendData(DataReader $dataReader) {
        $this->data = Hash::merge($this->data, $dataReader->getData());
    }
    
    public function getData() {
        $this->copy();
        return Hash::expand($this->data);
    }
    
    abstract protected function copy();
    
}
