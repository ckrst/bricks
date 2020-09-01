<h1>Mashup Editor</h1>

<div class="row">
	<div class="col-md-8">
		<?php echo $this->Form->create('Mashup'); ?>
			<div class="form-group">
				<label for="txtMashupName">Name</label>
				<input type="text" class="form-control" id="txtMashupName" placeholder="Enter mashup name"
				value="<?php echo $mashup['Mashup']['nome']; ?>" name="data[Mashup][nome]">
			</div>

			<div class="form-group">
				<label for="txtMashupLayout">Layout</label>
				<input type="text" class="form-control" id="txtMashupLayout" placeholder="Enter mashup Layout"
				value="<?php echo $mashup['Mashup']['layout']; ?>" name="data[Mashup][layout]">
			</div>

			<?php
			for ($i = 1; $i <= 4; $i++) {
				?>
				<div class="form-group">
					<label for="txtMashupWidget<?php echo $i; ?>">Widget <small>Zone <?php echo $i; ?></small></label>
					<select name="data[MashupWidget][<?php echo $i; ?>][widget_id]" class="form-control" id="txtMashupWidget<?php echo $i; ?>">
						<?php
						foreach ($widgets as $widgetItem) {
							?>
							<option value="<?php echo $widgetItem['Widget']['id']; ?>"><?php echo $widgetItem['Widget']['nome']; ?></option>
							<?php
						}
						?>
					</select>
				</div>
				<?php
			}
			?>

			<button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-save"></span>Save</button>
		</form>
	</div>

	<div class="col-md-4">
		<div class="panel panel-default">
			<div class="panel-body">
				<h6><?php echo $mashup['Mashup']['nome']; ?></h6>
				<div class="row">
					<?php
					switch ($mashup['Mashup']['layout']) {

						case MASHUP_LAYOUT_FULLPAGE:
							?>
							<div class="well col-md-12">
								ZONE 1
								<BR><BR><BR><BR>
							</div>
							<?php
							break;
						case MASHUP_LAYOUT_2COLS:
							for ($i = 1; $i <=2; $i++) {
								?>
								<div class="well col-md-6">
									ZONE <?php echo $i; ?>
									<BR><BR><BR><BR>
								</div>
								<?php
							}
							break;

						default:
							# code...
							break;
					}
					?>
				</div>
			</div>
		</div>
	</div>

</div>
