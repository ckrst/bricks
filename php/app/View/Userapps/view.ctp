<h2>App</hs>

<h4><?php echo $userapp['UserApp']['nome']; ?></h4>

<div class="fluid">
	<div class="">

		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Objects</h3>
			</div>
			<div class="panel-body">
				<?php
				if (count($userapp['Objeto'])) {
					var_dump($userapp['Objeto']);
				}
				?>
			</div>
		</div>

	</div>

	<div class="">

		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Guests</h3>
			</div>
			<div class="panel-body">
				<?php
				if (count($userapp['Guest'])) {
					var_dump($userapp['Guest']);
				}
				?>
			</div>
		</div>

	</div>

</div>
