<!-- File: /app/View/Surveys/index.ctp -->

<div class="container">

<?php echo $this->Html->link(
    '<i class="fa fa-plus-circle mr-1" aria-hidden="true"></i>  Survey anlegen',
    array('controller' => 'surveys', 'action' => 'add'),
	array('escape' => false, 'class' => 'btn btn-primary mb-2', 'style' => 'color: #fff;')
); ?>

<table class="table table-striped">
    <tr>
        <th>Id</th>
        <th>User</th>
        <th>Skills</th>
    </tr>

    <!-- Here is where we loop through our $surveys array, printing out survey info -->
    <?php foreach ($surveys as $survey): 	?>
    <tr>
        <td><?php echo $survey['Survey']['id']; ?></td>
		<td><?php echo $survey['User'][0]['name']; ?></td>
		<td><?php echo $this->Html->link(
                    'View',
                    array('action' => 'view', $survey['Survey']['id'])
                );
			?>
		</td>
    </tr>
    <?php endforeach; ?>
    <?php unset($survey); ?>
</table>
</div>
