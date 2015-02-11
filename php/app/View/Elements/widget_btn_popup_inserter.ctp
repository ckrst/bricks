<div>
	<button type="button" class="btn btn-primary" id="btnWidget<?php echo $widget['Widget']['id']; ?>" data-toggle="modal" data-target="#divModalWidget<?php echo $widget['Widget']['id']; ?>"><?php echo $widget['Widget']['nome']; ?></button>
</div>


<div class="modal fade" id="divModalWidget<?php echo $widget['Widget']['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title"><?php echo $widget['Widget']['nome']; ?></h4>
			</div>
			
			<div class="modal-body">
				
				<form id="frmInserterWidget<?php echo $widget['Widget']['id']; ?>" role="form">
					<?php
					foreach ($campos as $campo) {
						switch ($campo['Campo']['tipo']) {
							case CAMPO_TIPO_TEXTO_LIVRE:
							case CAMPO_TIPO_STRING:
							case CAMPO_TIPO_EMAIL:
							case CAMPO_TIPO_URL:
							case CAMPO_TIPO_DATA:
							case CAMPO_TIPO_OBJETO:
							case CAMPO_TIPO_NUMERO_INTEIRO:
								echo $this->Element('divCampoForm', array('campo' => $campo));
							default:
								break;
						}
					}
					?>
				</form>
				
			</div>
			
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
				<button type="button" class="btn btn-primary" id="btnSalvarNovoObjeto" onclick="insertObj<?php $objeto['Objeto']['id']; ?>();">Salvar</button>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">

		function insertObj<?php $objeto['Objeto']['id']; ?>()
		{
			//var data = $("#frmInserterWidget<?php echo $widget['Widget']['id']; ?>").serialize();
			
			$.ajax({
				url: "/brix/php/chaves.json",
				data: "data[Chave][objeto_id]=<?php echo $objeto['Objeto']['id']; ?>",
				type: "POST",
				dataType: "json",
				success: function(response) {
					var chave_id = response.data.id;
					$(".CAMPO_OBJETO").each(function() {
						var campo = $(this).attr("campo");
						var valor = $(this).val();
						$(this).val("");
						$.ajax({
							url: "/brix/php/valores.json",
							data: "chave_id=" + chave_id + "&campo_id=" + campo + "&valor_campo=" + valor,
							type: "POST",
							dataType: "json",
							success: function(response) {
								
							}
						});
					});

					//dismiss modal

				}
			});
		}

		$(document).ready(function(){
		});
</script>