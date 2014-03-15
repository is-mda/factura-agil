<?php
App::uses('AppController', 'Controller');

class UsersController extends AppController {

    public $uses = array();
    
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow();
    }
    
    public function register() {
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Messaging->success(__('The user has been registered'));
                return $this->redirect('/');
            }
            $this->Messaging->error(__('The user could not be saved. Please, try again.'));
        }
    }
    
    public function login() {        
        if (!$this->request->is('post')) return; 
        if ($this->Auth->login()) return $this->redirect($this->Auth->redirectUrl());
        else $this->Messaging->error(__('Username or password is incorrect'), 'auth');
    }
    
    public function logout() {
        $this->getEventManager()->dispatch(new CakeEvent('Controller.Users.logout' , $this));
        return $this->redirect($this->Auth->logout());
    }
    
}
