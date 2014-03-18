<?php

App::uses('Controller', 'Controller');

class AppController extends Controller {
    
    public $components = array(
        'Session',
        'Messaging',
        'Workspace',
        'Auth' => array(
            'authError' => false,
            'authenticate' => array(
                'Form' => array(
                    'fields' => array('username' => 'email')
                )
            )
        )
    );
    
    public $helpers = array(
        'Country'
    );
    
}
