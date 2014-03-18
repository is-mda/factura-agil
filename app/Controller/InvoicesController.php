<?php

App::uses('AppController', 'Controller');

class InvoicesController extends AppController {

    public $components = array('Paginator');

    public function index() {
        $this->Invoice->recursive = 0;
        $this->set('invoices', $this->Paginator->paginate('Invoice', array('Invoice.company_id' => $this->Workspace->get('id'))));
    }

    public function view($id = null) {        
        if (!$this->Invoice->exists($id)) {
            throw new NotFoundException(__('Invalid invoice'));
        }
        $invoice = $this->Invoice->find('first', array('conditions' => array('Invoice.' . $this->Invoice->primaryKey => $id)));
        $this->set('title_for_layout', __('Invoice: ') . $invoice['Invoice']['code']);
        $this->layout = 'invoice';
        $this->set('invoice', $invoice);
    }

    public function add($client = null) {
        if ($this->request->is('post')) {
            $this->Invoice->create();
            if ($this->Invoice->saveAssociated($this->request->data)) {
                $this->Messaging->success(__('The invoice has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Messaging->error(__('The invoice could not be saved. Please, try again.'));
            }
        }
        if(empty($client)) return $this->redirect(array('action' => 'select_client'));
        $this->request->data = $this->Invoice->prepareData($client, $this->Workspace->get('id'));
    }

    public function select_client() {
        if ($this->request->is('post')) return $this->redirect(array('action' => 'add', $this->request->data('Invoice.client_id')));        
        $clients = $this->Invoice->Client->find('list', array('conditions' => array('Client.company_id' => $this->Workspace->get('id'))));
        if(empty($clients)) {
            $this->Messaging->info(__('You must create at least one client to can add invoices'));
            return $this->redirect(array('controller' => 'clients', 'action' => 'add_then_add_invoice'));
        }
        if(count($clients) == 1) return $this->redirect(array('action' => 'add', key($clients)));
        $this->set(compact('clients'));
    }
    
    public function edit($id = null) {
        if (!$this->Invoice->exists($id)) {
            throw new NotFoundException(__('Invalid invoice'));
        }
        if ($this->request->is(array('post', 'put'))) {
            $this->Invoice->deleteNonExistentLines($this->request->data);
            if ($this->Invoice->saveAssociated($this->request->data)) {
                $this->Messaging->success(__('The invoice has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Messaging->error(__('The invoice could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Invoice.' . $this->Invoice->primaryKey => $id));
            $this->request->data = $this->Invoice->find('first', $options);
        }
        $companies = $this->Invoice->Company->find('list');
        $clients = $this->Invoice->Client->find('list');
        $this->set(compact('companies', 'clients'));
    }

    public function delete($id = null) {
        $this->Invoice->id = $id;
        if (!$this->Invoice->exists()) {
            throw new NotFoundException(__('Invalid invoice'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Invoice->delete()) {
            $this->Messaging->success(__('The invoice has been deleted.'));
        } else {
            $this->Messaging->error(__('The invoice could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

}
