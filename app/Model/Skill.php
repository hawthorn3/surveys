<?php
class Skill extends AppModel {
	
	var $name = 'Skill';
	// a skill can appear in multiple surveys
	var $hasMany = array(
		'Survey' => array(
			'className' => 'Survey',
			'foreign_key' => 'skill_id'
		)
	);
	
	
}
