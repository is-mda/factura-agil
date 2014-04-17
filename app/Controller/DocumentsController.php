<?php

App::uses('AppController', 'Controller');

abstract class DocumentsController extends AppController {

    public $components = array('Paginator');

    abstract protected function getModel();
    
    protected function getModelName() {
        return $this->getModel()->name;
    }
    
    protected function getDocument() {
        return $this->getModel()->Document;
    }

    protected function getHumanizedModelName() {
        return Inflector::humanize(Inflector::underscore($this->getModelName()));
    }
    
    public function index() {
        $this->getModel()->recursive = 0;
        $this->set(
                Inflector::variable(Inflector::pluralize($this->getModelName())), 
                $this->Paginator->paginate($this->getModelName(), array('Document.company_id' => $this->Workspace->get('id')))
        );
    }

    public function view($id = null) {        
        if (!$this->getModel()->exists($id)) {
            throw new NotFoundException(__('Invalid ' . $this->getHumanizedModelName()));
        }
        $document = $this->getModel()->find('first', array('conditions' => array($this->getModelName() . '.' . $this->getModel()->primaryKey => $id)));
        $this->set('title_for_layout', __($this->getHumanizedModelName()) . ': ' . $document['Document']['code']);
        $this->layout = 'document';
        $this->set(Inflector::variable($this->getModelName()), $document);        
    }

    public function add($client = null) {
        if ($this->request->is('post')) {
            $this->getModel()->create();
            if ($this->getModel()->saveAssociated($this->request->data)) {
                $this->Messaging->success(__('The document has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Messaging->error(__('The document could not be saved. Please, try again.'));
            }
        }
        if(empty($client)) return $this->redirect(array('action' => 'select_client'));
        $this->request->data = $this->getDocument()->prepareData($client, $this->Workspace->get('id'));
    }

    public function select_client() {
        if ($this->request->is('post')) return $this->redirect(array('action' => 'add', $this->request->data('Document.client_id')));        
        $clients = $this->getDocument()->Client->find('list', array('conditions' => array('Client.company_id' => $this->Workspace->get('id'))));
        if(empty($clients)) {
            $this->Messaging->info(__('You must create at least one client to can add documents'));
            return $this->redirect(array('controller' => 'clients', 'action' => 'add_then_add_document', Inflector::underscore($this->getModelName())));
        }
        if(count($clients) == 1) return $this->redirect(array('action' => 'add', key($clients)));
        $this->set(compact('clients'));
    }
    
    public function edit($id = null) {
        if (!$this->getModel()->exists($id)) {
            throw new NotFoundException(__('Invalid document'));
        }
        if ($this->request->is(array('post', 'put'))) {
            $this->getDocument()->deleteNonExistentLines($this->request->data);
            if ($this->getModel()->saveAssociated($this->request->data)) {
                $this->Messaging->success(__('The document has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Messaging->error(__('The document could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array($this->getModelName() . '.' . $this->getModel()->primaryKey => $id));
            $this->request->data = $this->getModel()->find('first', $options);
        }
    }

    public function delete($id = null) {
        $this->getModel()->id = $id;
        if (!$this->getModel()->exists()) {
            throw new NotFoundException(__('Invalid document'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->getModel()->delete()) {
            $this->Messaging->success(__('The document has been deleted.'));
        } else {
            $this->Messaging->error(__('The document could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

}
