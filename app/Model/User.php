<?php
App::uses('AppModel', 'Model');

class User extends AppModel {
    
    public $displayField = 'name';

    public function beforeSave($options = array()) {
        if (!$this->id) {
            $passwordHasher = new SimplePasswordHasher();
            $this->data['User']['password'] = $passwordHasher->hash(
                $this->data['User']['password']
            );
        }
        return true;
    }
    
}
