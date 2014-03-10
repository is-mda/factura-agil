<?php
App::uses('AppModel', 'Model');

class Client extends AppModel {

	public $validate = array(
		'name' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
			)
		)
	);
}
