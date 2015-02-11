<div class="navbar-form pull-right">

    <?php
    if ($authUser) {
		?>
        <a href="<?php echo $this->Html->url('/users/logout'); ?>" class="btn btn-danger hidden-lg hidden-md" id="logout-button-mobile"><span class="glyphicon glyphicon-off"></span> <?php echo __(''); ?></a>
        <a href="<?php echo $this->Html->url('/users/logout'); ?>" class="btn btn-danger hidden-xs hidden-sm" id="logout-button"><i class="glyphicon glyphicon-off"></i> <?php echo __(''); ?></a>
    	<?php
    } else {
		?>
        <a href="<?php echo $this->Html->url('/users/login'); ?>" id="login-button" class="btn btn-info" ><i class="icon-user"></i> <?php echo __('Login'); ?></a>
    	<?php
    }
    ?>
    &nbsp;
</div>