<?php

class DocumentCodeGenerator {

    static private $docType;
    
    static private function encode($number) {
        return strtoupper(substr(self::$docType->name, 0, 3)) . '/' . str_pad($number, 6, "0", STR_PAD_LEFT);
    }
    
    static private function decode($code) {
        $decoded = explode('/', $code);
        return intval($decoded[1]);
    }
    
    static private function getLastCode() {
        $document = self::$docType->find('first', array(
            'order' =>  "Document.created DESC", 
            'recursive' => 0
        ));
        return empty($document) ? null : $document['Document']['code'];
    }
    
    static public function generateCode(DocumentType $docType) {
        self::$docType = $docType;
        $lastCode = self::getLastCode();
        return self::encode(empty($lastCode) ? 1 : (self::decode($lastCode) + 1));
    }
    
}
