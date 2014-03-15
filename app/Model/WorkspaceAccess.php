<?php

App::uses('AppModel', 'Model');

class WorkspaceAccess extends AppModel {

    public $useTable = 'companies_users';
    public $belongsTo = array('Company', 'User');

    public function getCompaniesByUser($user) {
        return Hash::extract($this->find('all', array(
        'conditions' => array('WorkspaceAccess.user_id' => $user),
        'recursive' => -1
        )), '{n}.WorkspaceAccess.company_id');
    }

}
