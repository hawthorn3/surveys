<?php
class Survey extends AppModel {
	
	var $name = 'Survey';
	
	// a survey includes multiple skills and can be taken by a number of users
	var $hasMany = array(
		'User' => array(
			'className' => 'User',
			'foreign_key' => 'survey_id'
			),
		'Skill' => array(
			'className' => 'Skill',
			'foreign_key' => 'survey_id'
			)
		);	
}
