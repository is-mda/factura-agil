<?php

App::uses('AppModel', 'Model');

class Company extends AppModel {

    public $displayField = 'name';
    public $hasMany = array('Client');

    public function afterSave($created, $options = array()) {
        $this->getEventManager()->dispatch(new CakeEvent('Model.Company.' . ($created?'afterCreate':'afterEdit'), $this));
    }
    
    public function afterDelete() {
        $this->getEventManager()->dispatch(new CakeEvent('Model.Company.afterDelete', $this));
    }

}
