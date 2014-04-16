<?php

App::uses('AppModel', 'Model');

class Product extends AppModel {

    public $displayField = 'name';
    public $validate = array(
        'ean' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
            )
        ),
        'name' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
            )
        ),
        'price' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            )
        )
    );

    public function afterSave($created, $options = array()) {
        if ($created) $this->getEventManager()->dispatch(new CakeEvent('Model.Product.afterCreate', $this));
    }    
}
