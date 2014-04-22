<?php

abstract class DataReader {
    
    protected function loadModel($alias) {
        return ClassRegistry::init($alias);
    }
    
    abstract public function getData($params);
    
}
