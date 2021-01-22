
	<table cellpadding="0" cellspacing="0" border="0" id="table" class="sortable">
		<thead>
		<tr>
			<th id="name" class="<?=($result['sort'] == 'name' ? ($result['path'] == 'asc' ? 'asc' : 'desc') : 'head')?> title"><h3>Name</h3></th>
			<th id="еmail" class="<?=($result['sort'] == 'еmail' ? ($result['path'] == 'asc' ? 'asc' : 'desc') : 'head')?> title"><h3>е-mail</h3></th>
			<th id=Task"><h3>Task</h3></th>
			<th id="completed" class="<?=($result['sort'] == 'completed' ? ($result['path'] == 'asc' ? 'asc' : 'desc') : 'head')?> title"><h3>Completed</h3></th>

		</tr>
		</thead>
		<tbody>

<?php
foreach ($result['tasks'] as $task) {
	?>
	<tr>
	<?
	foreach ($task as $name => $value) {
	    if ($name == 'id') {
			$id = $value;
			continue;
		}
		if ($name == 'completed') {
			if ($value) {
				?>
                <td><input type="checkbox" data-name="completed" id="ch<?=$id?>" data-id="<?=$id?>" checked <?= ($result['user'] == 'admin' ? "" : 'disabled') ?>></td>
				<?
			} else {
				?>
                <td><input type="checkbox" data-name="completed" id="ch<?=$id?>" data-id="<?=$id?>" <?= ($result['user'] == 'admin' ? "" : 'disabled') ?>></td>
				<?
			}
			continue;
		}

		if ($name == 'task') {
			?>
            <td>
				<?= ($result['user'] == 'admin' ? '<textarea type="text" data-name="task" id="ta' . $id . '" data-id="'. $id . '">' . $value . '</textarea>' : $value) ?>
            </td>
			<?
			continue;
		}
		?>
		<td>
		<?=$value?>
		</td>
		<?
	}
	?>

	    </tr>
	<?
}
?>
</tbody>
</table>

