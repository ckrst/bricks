<?php
/**
 *
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
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
		//echo $this->Html->script('bootstrap-datepicker');
		//echo $this->Html->script('bootstrap-fileinput');

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
					<div class="navbar-header" style="width: 160px;">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="#">Brix</a>
					</div>
					
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<?php
						if ($authUser) {
							?>
							<ul class="nav navbar-nav">
								<li class="active"><a href="<?php echo $this->html->url('/dashboard'); ?>"><span class="glyphicon glyphicon-dashboard"></span></a></li>
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">My stuff <b class="caret"></b></a>
									<ul class="dropdown-menu">
										<li><?php echo $this->Html->link('My apps', '/userapps'); ?></li>
									</ul>
								</li>
							</ul>
							<?php 
						} 
						?>
						
						<?php echo $this->element('login_logout', array('authUser' => $authUser)); ?>
						
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
