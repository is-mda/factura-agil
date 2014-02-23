<?php
App::uses('AppController', 'Controller');

class UsersController extends AppController {

    public $uses = array();
    
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow();
    }
    
    public function login() {        
        if (!$this->request->is('post')) return; 
        if ($this->Auth->login()) return $this->redirect($this->Auth->redirectUrl());
        else $this->Session->setFlash(__('Username or password is incorrect'), 'custom_flash_error', array(), 'auth');
    }
    
    public function logout() {
        return $this->redirect($this->Auth->logout());
    }
    
}
