<?php

App::uses('AppController', 'Controller');

class CompaniesController extends AppController {

    public $components = array('Paginator');    
    
    public function index() {
        $this->Company->recursive = 0;
        $this->set('companies', $this->Paginator->paginate('Company', array(
            'Company.id' => ClassRegistry::init('WorkspaceAccess')->getCompaniesByUser($this->Auth->user('id'))
        )));
    }

    public function add() {
        if ($this->request->is('post')) {
            $this->Company->create();
            if ($this->Company->save($this->request->data)) {
                $this->Messaging->success(__('The company has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Messaging->error(__('The company could not be saved. Please, try again.'));
            }
        }
    }

    public function select($id = null) {
        $this->Workspace->select($id);
        $this->redirect(array('action'=>'index'));
    }

    public function edit($id = null) {
        if (!$this->Company->exists($id)) {
            throw new NotFoundException(__('Invalid company'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Company->save($this->request->data)) {
                $this->Messaging->success(__('The company has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Messaging->error(__('The company could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Company.' . $this->Company->primaryKey => $id));
            $this->request->data = $this->Company->find('first', $options);
        }
    }

    public function delete($id = null) {
        $this->Company->id = $id;
        if (!$this->Company->exists()) {
            throw new NotFoundException(__('Invalid company'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Company->delete()) {
            $this->Messaging->success(__('The company has been deleted.'));
        } else {
            $this->Messaging->error(__('The company could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

}
