<?php
App::uses('AppModel', 'Model');

class Company extends AppModel {

	public $displayField = 'name';
        
        public $hasAndBelongsToMany = array(
            'hasAccess' => array(
                'className' => 'User'
            )
        );

}
