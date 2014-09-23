<?php
?>
<h2>Apps</h2>

<?php echo $this->Html->link('New app', 'add', array('class' => 'button')); ?>

<?php
if (count($apps)) {
	?>
	<table class="table">
		<?php
		foreach ($apps as $userApp) {
			?>
			<tr>
				<td><?php echo $userApp['UserApp']['id']; ?></td>
				<td><?php echo $userApp['UserApp']['nome']; ?></td>
				<td>
					<?php echo $this->Html->link('edit', 'edit/' . $userApp['UserApp']['id']); ?>
					<?php echo $this->Html->link('view', 'view/' . $userApp['UserApp']['id']); ?>
				</td>
			</tr>
			<?php
		}
		?>
	</table>
	<?php
}
?>
