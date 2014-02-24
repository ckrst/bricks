<?php

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

		
		switch (intval($mashup['Mashup']['style'])) {
			case MASHUP_STYLE_1:
				echo $this->Html->css('sb-admin/css/bootstrap');
				echo $this->Html->css('sb-admin/css/sb-admin');
				break;
			case MASHUP_STYLE_2:
				echo $this->Html->css('sb-admin-v2/css/bootstrap');
				echo $this->Html->css('sb-admin-v2/css/sb-admin');
				break;
			default:
				echo $this->Html->css('bootstrap.min');
				echo $this->Html->css('bootstrap-theme.min');
				break;
		}
		
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
		<div id="header">
			<nav class="navbar navbar-default" role="navigation">
				<div class="container-fluid">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="#">Brix</a>
					</div>
				</div>
			</nav>
		</div>
		<div id="content">

			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">
			f
		</div>
	</div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
