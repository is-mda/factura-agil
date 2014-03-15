<?php

App::uses('AppModel', 'Model');

class WorkspaceAccess extends AppModel {

    public $useTable = 'companies_users';
    
    public $belongsTo = array('Company', 'User');
    
    public function getCompaniesByUser($user) {
        return array_map(function($record) {
            return $record['WorkspaceAccess']['company_id'];
            }, $this->find('all', array(
                'conditions' => array('WorkspaceAccess.user_id' => $user),
                'recursive' => -1
            ))
        );
    }
    
}
