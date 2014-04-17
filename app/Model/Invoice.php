<?php

App::uses('AppModel', 'Model');

class Invoice extends AppModel {

    public $belongsTo = array(
        'Document'
    );
    
}
