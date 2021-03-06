
<style type="text/css">
.form-signin {
  max-width: 330px;
  padding: 15px;
  margin: 0 auto;
}
.form-signin .form-signin-heading,
.form-signin .checkbox {
  margin-bottom: 10px;
}
.form-signin .checkbox {
  font-weight: normal;
}
.form-signin .form-control {
  position: relative;
  height: auto;
  -webkit-box-sizing: border-box;
     -moz-box-sizing: border-box;
          box-sizing: border-box;
  padding: 10px;
  font-size: 16px;
}
.form-signin .form-control:focus {
  z-index: 2;
}
.form-signin input[type="text"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}
.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}

</style>

<div class="container">



	<?php echo $this->Form->create(false, array('class' => 'form-signin')); ?>
		<h2 class="form-signin-heading">Please register</h2>

		<?php echo $this->Session->flash('flash_error'); ?>

		

		<?php echo $this->Form->input('email', array('class' => 'form-control')); ?>
		<?php echo $this->Form->input('username', array('class' => 'form-control')); ?>
		<?php echo $this->Form->input('password', array('class' => 'form-control')); ?>

		

		<label class="checkbox">
			<input type="checkbox" value="remember-me"> Remember me
		</label>
		<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
	<?php echo $this->Form->end(); ?>

	<p>or <?php echo $this->Html->link('Login', '/users/login'); ?></p>

    </div> <!-- /container -->.