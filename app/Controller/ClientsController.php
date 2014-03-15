<?php

App::uses('AppController', 'Controller');

class ClientsController extends AppController {

    public $components = array('Paginator');

    public function index() {
        $this->Client->recursive = 0;
        $this->set('clients', $this->Paginator->paginate('Client', array('Client.company_id' => $this->Workspace->get('id'))));
    }

    public function add() {
        if ($this->request->is('post')) {
            $this->Client->create();
            if ($this->Client->save($this->request->data)) {
                $this->Messaging->success(__('The client has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Messaging->error(__('The client could not be saved. Please, try again.'));
            }
        }
    }

    public function edit($id = null) {
        if (!$this->Client->exists($id)) {
            throw new NotFoundException(__('Invalid client'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Client->save($this->request->data)) {
                $this->Messaging->success(__('The client has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Messaging->error(__('The client could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Client.' . $this->Client->primaryKey => $id));
            $this->request->data = $this->Client->find('first', $options);
        }
    }

    public function delete($id = null) {
        $this->Client->id = $id;
        if (!$this->Client->exists()) {
            throw new NotFoundException(__('Invalid client'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Client->delete()) {
            $this->Messaging->success(__('The client has been deleted.'));
        } else {
            $this->Messaging->error(__('The client could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

}
