<?php

App::uses('Controller', 'Controller');

class AppController extends Controller {
    
    public $components = array(
        'Session',
        'Messaging',
        'Auth' => array(
            'authError' => false,
            'authenticate' => array(
                'Form' => array(
                    'fields' => array('username' => 'email')
                )
            )
        )
    );
    
}
