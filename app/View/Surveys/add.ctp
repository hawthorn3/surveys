<!-- File: /app/View/Surveys/add.ctp -->

<div class="container">	
	<fieldset>
	<legend><?php echo __('Survey anlegen'); ?></legend>
	<?php
	echo $this->Form->create('Survey');
	echo $this->Form->input('user_id', array('label' => 'User', 'options' => array($users), 'class' => 'form-control mb-3 col-2'));

// 	give score and confidence number for every existing skill (TODO: Controller)
	foreach ($skills as $skill) {
		echo $this->Form->input('skill_id', array('label' => 'Skill', 'options' => array($skill), 'class' => 'form-control mb-3 col-2', 'div' => false));
		echo $this->Form->input('score', array('label' => 'Score', 'options' => array('1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5'), 'class' => 'form-control mb-3  col-1', 'div' => false));
		echo $this->Form->input('confidence', array('label' => 'Confidence', 'class' => 'form-control mb-3 col-1', 'div' => false));
	}
	
	//generates a Submit button	
	echo $this->Form->end(array('label' => 'Survey speichern', 'class' => 'btn btn-primary mb-2'));
	?>
	</fieldset>
</div>