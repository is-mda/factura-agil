<?php

App::uses('Controller', 'Controller');

class AppController extends Controller {
    
    public $components = array(
        'Session',
        'Auth' => array(            
            'loginAction' => array(
                'controller' => 'users',
                'action' => 'login'
            ),
            'authenticate' => array(
                'Form' => array(
                    'fields' => array('username' => 'email')
                )
            )
        )
    );
    
}
