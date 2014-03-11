<?php
App::uses('AppController', 'Controller');

class InvoicesController extends AppController {

	public $components = array('Paginator');

        public function index() {
		$this->Invoice->recursive = 0;
		$this->set('invoices', $this->Paginator->paginate());
	}

	public function view($id = null) {
		if (!$this->Invoice->exists($id)) {
			throw new NotFoundException(__('Invalid invoice'));
		}
		$options = array('conditions' => array('Invoice.' . $this->Invoice->primaryKey => $id));
		$this->set('invoice', $this->Invoice->find('first', $options));
	}

	public function add() {
		if ($this->request->is('post')) {
			$this->Invoice->create();
			if ($this->Invoice->save($this->request->data)) {
				$this->Messaging->success(__('The invoice has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Messaging->error(__('The invoice could not be saved. Please, try again.'));
			}
		}
		$companies = $this->Invoice->Company->find('list');
		$clients = $this->Invoice->Client->find('list');
		$this->set(compact('companies', 'clients'));
	}

	public function edit($id = null) {
		if (!$this->Invoice->exists($id)) {
			throw new NotFoundException(__('Invalid invoice'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Invoice->save($this->request->data)) {
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
