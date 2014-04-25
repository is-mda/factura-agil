<?php

App::uses('AppController', 'Controller');

class ProductsController extends AppController {

    public $components = array('Paginator');

    public function index() {
        $this->Product->recursive = 0;
        $conditions = array('Product.company_id' => $this->Workspace->get('id'));
        if(!empty($this->request->query['filter']['Product.name'])) $conditions['Product.name LIKE'] = '%' . $this->request->query['filter']['Product.name'] . '%';
        if(!empty($this->request->query['filter']['Product.code'])) $conditions['Product.code'] = $this->request->query['filter']['Product.code'];
        $this->set('products', $this->Paginator->paginate('Product', $conditions));
    }

    public function add() {
        if ($this->request->is('post')) {
            $this->Product->create();
            if ($this->Product->save($this->request->data)) {
                $this->Messaging->success(__('The product has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Messaging->error(__('The product could not be saved. Please, try again.'));
            }
        }
    }

    public function edit($id = null) {
        if (!$this->Product->exists($id)) {
            throw new NotFoundException(__('Invalid product'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Product->save($this->request->data)) {
                $this->Messaging->success(__('The product has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Messaging->error(__('The product could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Product.' . $this->Product->primaryKey => $id));
            $this->request->data = $this->Product->find('first', $options);
        }
    }

    public function delete($id = null) {
        $this->Product->id = $id;
        if (!$this->Product->exists()) {
            throw new NotFoundException(__('Invalid product'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Product->delete()) {
            $this->Messaging->success(__('The product has been deleted.'));
        } else {
            $this->Messaging->error(__('The product could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

}
