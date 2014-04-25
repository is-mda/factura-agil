<?php

App::uses('AppController', 'Controller');

class ClientsController extends AppController {

    public $components = array('Paginator');

    public function index() {
        $this->Client->recursive = 0;
        $conditions = array('Client.company_id' => $this->Workspace->get('id'));
        if(!empty($this->request->query['filter']['Client.name'])) $conditions['Client.name LIKE'] = '%' . $this->request->query['filter']['Client.name'] . '%';
        if(!empty($this->request->query['filter']['Client.country'])) $conditions['Client.country'] = $this->request->query['filter']['Client.country'];        
        $this->set('clients', $this->Paginator->paginate('Client', $conditions));
    }

    public function add() {
        if ($this->request->is('post')) {
            $this->Client->create();
            if ($this->Client->saveAssociated($this->request->data)) {
                $this->Messaging->success(__('The client has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Messaging->error(__('The client could not be saved. Please, try again.'));
            }
        }
    }

    public function add_then_add_document($documentType) {
        if ($this->request->is('post')) {
            $this->Client->create();
            if ($this->Client->saveAssociated($this->request->data)) {
                return $this->redirect(array('controller' => $documentType, 'action' => 'add', $this->Client->id));
            } else {
                $this->Messaging->error(__('The client could not be saved. Please, try again.'));
            }
        }
        $this->render('add');
    }
    
    public function select($documentType) {
        if ($this->request->is('post')) return $this->redirect_to_document_add($documentType, $this->request->data('Document.client_id'));
        $clients = $this->Client->find('list', array('conditions' => array('Client.company_id' => $this->Workspace->get('id'))));
        if(empty($clients)) {
            $this->Messaging->info(__('You must create at least one client to can add documents'));
            return $this->redirect(array('action' => 'add_then_add_document', $documentType));
        }
        if(count($clients) == 1) return $this->redirect_to_document_add($documentType, key($clients));
        $this->set(compact('clients'));
    }
    
    private function redirect_to_document_add($documentType, $clientId) {
        $this->redirect(array('controller' => $documentType, 'action' => 'add', $clientId));
    }
    
    public function edit($id = null) {
        if (!$this->Client->exists($id)) {
            throw new NotFoundException(__('Invalid client'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Client->saveAssociated($this->request->data)) {
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
