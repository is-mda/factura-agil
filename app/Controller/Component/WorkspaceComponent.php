<?php

App::uses('Component', 'Controller');
App::uses('CakeEventManager', 'Event');

class WorkspaceComponent extends Component {

    public $components = array('Session', 'Auth');
    private $sessionKey = 'Workspace.current';
    private $viewVar = 'currentCompany';

    public function initialize(Controller $controller) {
        $this->controller = $controller;
        $this->Company = ClassRegistry::init('Company');
        $this->WorkspaceAccess = ClassRegistry::init('WorkspaceAccess');
        $this->attachModelEvents();
    }

    private function attachModelEvents() {
        CakeEventManager::instance()->attach(array($this, 'onCompanyAfterEdit'), 'Model.Company.afterEdit');
        CakeEventManager::instance()->attach(array($this, 'onCompanyAfterDelete'), 'Model.Company.afterDelete');
        CakeEventManager::instance()->attach(array($this, 'onCompanyAfterCreate'), 'Model.Company.afterCreate');
        CakeEventManager::instance()->attach(array($this, 'onClientAfterCreate'), 'Model.Client.afterCreate');
        CakeEventManager::instance()->attach(array($this, 'onUserLogout'), 'Controller.Users.logout');
    }

    public function onCompanyAfterCreate($event) {
        $this->WorkspaceAccess->save(
                array('WorkspaceAccess' => array(
                        'company_id' => $event->subject()->id,
                        'user_id' => $this->Auth->user('id')
        )));
    }

    public function onClientAfterCreate($event) {
        $event->subject()->saveField('company_id', $this->get('id'));
    }

    public function onCompanyAfterEdit($event) {
        if ($this->get('id') == $event->subject()->id)
            $this->select($this->get('id'));
    }

    public function onCompanyAfterDelete($event) {
        if ($this->get('id') == $event->subject()->id)
            $this->deselect();
    }
    
    public function onUserLogout($event) {
        $this->deselect();
    }

    public function deselect() {
        $this->Session->delete($this->sessionKey);
    }

    public function findCurrent($id = null) {
        $options = array(
            'conditions' => array(
                'Company.' . $this->Company->primaryKey =>
                    !empty($id) ? $id : $this->WorkspaceAccess->getCompaniesByUser($this->Auth->user('id'))
        ));
        return $this->Company->find('first', $options);
    }

    public function select($id = null) {
        $this->deselect();
        $current = $this->findCurrent($id);
        if (!empty($current)) {
            $this->Session->write($this->sessionKey, $current);
            return true;
        }
        return false;
    }

    public function selected() {
        return $this->Session->check($this->sessionKey);
    }

    public function get($field = null) {
        $current = $this->Session->read($this->sessionKey);
        if ($field and !empty($current))
            return $current['Company'][$field];
        return $current;
    }

    public function startup(Controller $controller) {
        if (!$this->selected() and !$this->select() and !$this->inAddAction() and $this->Auth->user() and !$this->inLogoutAction()) {
            $controller->Messaging->info(__('You must create at least one company'));
            $controller->redirect(array('controller' => 'companies', 'action' => 'add'));
        }
    }

    public function inAddAction() {
        return $this->controller->request->params['controller'] == 'companies' and $this->controller->request->params['action'] == 'add';
    }

    public function inLogoutAction() {
        return $this->controller->request->params['controller'] == 'users' and $this->controller->request->params['action'] == 'logout';
    }
    
    public function beforeRender(Controller $controller) {
        $controller->set($this->viewVar, $this->get());
    }

}
