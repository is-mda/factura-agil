<?php

abstract class DocumentDataCopyStrategy {
    
    protected $params = array();
    
    protected $data = array();
    
    public function setParams($params) {
        $this->params = $params;
    }
    
    protected function appendData(DataReader $dataReader) {
        
        //$this->data = array_merge($this->data);
    }
    
    abstract public function copy();
    
}
