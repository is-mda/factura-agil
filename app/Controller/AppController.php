<?php

App::uses('Controller', 'Controller');

class AppController extends Controller {
    
    public $components = array(
        'Session',
        'Messaging',
        'Auth' => array(
            'authenticate' => array(
                'Form' => array(
                    'fields' => array('username' => 'email')
                )
            )
        )
    );
    
}
