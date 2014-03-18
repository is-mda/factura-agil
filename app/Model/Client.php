<?php

App::uses('AppModel', 'Model');

class Client extends AppModel {

    public $validate = array(
        'name' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
            )
        ),
        'fiscal_code' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
            )
        ),
        'fiscal_code' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
            )
        ),
    );
    public $belongsTo = array('Company');

    public function afterSave($created, $options = array()) {
        if ($created) $this->getEventManager()->dispatch(new CakeEvent('Model.Client.afterCreate', $this));
    }

}
