<?php
class User extends AppModel {
	
	var $belongsTo = array(
		'Survey' => array(
			'className' => 'Survey',
			'foreignKey' => 'user_id'
			)
		);
	
	
}
