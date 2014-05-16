<?php
/**
 */
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('bootstrap.min');
		echo $this->Html->css('bootstrap-theme.min');
		
		echo $this->Html->script('jquery-2.1.0.min');
		echo $this->Html->script('bootstrap.min');
		echo $this->Html->script('bootstrap-datepicker');
		echo $this->Html->script('bootstrap-fileinput');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<div id="container">
			<?php echo $this->fetch('content'); ?>
	</div>
</body>
</html>
