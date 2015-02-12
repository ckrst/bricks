<?php
//var_dump($campos);
?>
<table class="table">
	<thead>
		<tr>
			<?php 
			foreach ($campos as $campo) {
				var_dump($campo);
				?>
				<th><?php echo $campo['Campo']['nome']; ?></th>
				<?php 
			}
			?>
		</tr>
	</thead>
	<tbody>
		<?php 
		foreach ($chaves as $chave) {
			$chaveId = intval($chave['Chave']['id']);
			?>
			<tr>
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
			</tr>
			<?php 
		}
		?>
	</tbody>
</table>