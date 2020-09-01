<?php
// var_dump($chaves);
?>
<table class="table">
	<thead>
		<tr>
			<th></th>
			<?php
			foreach ($campos as $campo) {
				// var_dump($campo);
				?>
				<th><?php echo $campo['Campo']['nome']; ?></th>
				<?php
			}
			?>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<?php
		foreach ($chaves as $chave) {
			// var_dump($chave);
			$chaveId = intval($chave['Chave']['id']);
			?>
			<script type="text/javascript">
					function removeItem<?php echo $chaveId; ?>() {
						alert("remove");
					}
					function editItem<?php echo $chaveId; ?>()
					{
						alert("edit");
					}
					$(document).ready(function(){
					});
			</script>
			<tr>
				<td><?php echo $chaveId; ?></td>
				<?php
				foreach ($campos as $campo) {
					$campoId = intval($campo['Campo']['id']);
					$valorCampo = '';
					if (isset($valores[$chaveId][$campoId]['Valor']['valor_campo'])) {
						$valorCampo = $valores[$chaveId][$campoId]['Valor']['valor_campo'];
					}
					?>
					<td><?php echo $valorCampo; ?></td>
					<?php
				}
				?>
				<td>
					<button type="button" class="btn btn-primary" id="btnEditWidget<?php echo $widget['Widget']['id']; ?>" data-toggle="modal" data-target="#divModalWidget<?php echo $widget['Widget']['id']; ?>" onclick="editItem<?php echo $chaveId; ?>();"><span class="glyphicon glyphicon-pencil"></span></button>
					<button type="button" class="btn btn-primary" id="btnRemoveWidget<?php echo $widget['Widget']['id']; ?>" data-toggle="modal" data-target="#divModalWidget<?php echo $widget['Widget']['id']; ?>" onclick="removeItem<?php echo $chaveId; ?>();"><span class="glyphicon glyphicon-trash"></span></button>
				</td>
			</tr>

			<?php
		}
		?>
	</tbody>
</table>
