<?php
?>

<div class="container">
	<div class="row">
	
		<div class="col-md-4">
			<div class="panel panel-default">
				
				<div class="panel-heading">
					<h3 class="panel-title">Objetos</h3>
				</div>
				
				<div class="panel-body">
					
					<ul id="ulListaObjetos" class="list-group">
					</ul>
				
					<button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#divFormObjeto">+</button>
				
				</div>
			</div>
			
			
		</div>
		
		<div class="col-md-8">
			<div class="panel panel-default">
				<div class="panel-body">
					
					
					<div class="dropdown">
						<button class="btn" data-toggle="dropdown">
							<span class="glyphicon glyphicon-cog"></span>
						</button>
						
						<ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
							<li>
								<a href="#">
									<span class="glyphicon glyphicon-pencil"></span>
									Editar
								</a>
							</li>
							<li>
								<a href="#">
									<span class="glyphicon glyphicon-trash"></span>
									Remover
								</a>
							</li>
							<li>
								<a href="#" data-toggle="modal" data-target="#divFormWidget">
									<span class="glyphicon glyphicon-hdd"></span>
									Gerar widget
								</a>
							</li>
						</ul>
					</div>
					
					
					<div id="divObjectEditor"></div>
					
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Novo Objeto -->
<div class="modal fade" id="divFormObjeto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel">Novo Objeto</h4>
			</div>
			
			<div class="modal-body">
				
				<form id="frmNovoObjeto" role="form">
					<div class="form-group">
						<label for="txtNomeObjeto">Nome</label>
						<input type="text" class="form-control" id="txtNomeObjeto" placeholder="Ex: Cliente">
					</div>
				</form>
				
			</div>
			
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
				<button type="button" class="btn btn-primary" id="btnSalvarNovoObjeto" data-dismiss="modal">Salvar</button>
			</div>
		</div>
	</div>
</div>

<!-- Novo Campo -->
<div class="modal fade" id="divFormCampo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel">Novo Campo</h4>
			</div>
			
			<div class="modal-body">
				
				<form id="frmNovoCampo" role="form">
					<div class="form-group">
						<label for="txtNomeCampo">Nome</label>
						<input type="text" class="form-control" id="txtNomeCampo" placeholder="Ex: Cliente">
					</div>
					<div class="form-group">
						<label for="selTipoCampo">Tipo</label>
						<select name="tipo" id="selTipoCampo">
							<option value="1">Texto</option>
						</select>
					</div>
				</form>
				
			</div>
			
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
				<button type="button" class="btn btn-primary" id="btnSalvarNovoCampo" data-dismiss="modal">Salvar</button>
			</div>
		</div>
	</div>
</div>

<!-- Gerar widget -->
<div class="modal fade" id="divFormWidget" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel">Novo Widget</h4>
			</div>
			
			<div class="modal-body">
				
				<form id="frmNovoWidget" role="form">
					<div class="form-group">
						<label for="txtNomeWidget">Nome</label>
						<input type="text" class="form-control" id="txtNomeWidget">
					</div>
					<div class="form-group">
						<label for="selTipoWidget">Tipo</label>
						<select name="tipo" id="selTipoWidget">
							<option value="<?php echo WIDGET_TIPO_TABELA; ?>">Tabela</option>
							<option value="<?php echo WIDGET_TIPO_BUTTON_POPUP_INSERTER; ?>">Button Popup Insert</option>
						</select>
					</div>
				</form>
				
			</div>
			
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
				<button type="button" class="btn btn-primary" id="btnSalvarNovoWidget" data-dismiss="modal">Salvar</button>
			</div>
		</div>
	</div>
</div>
<!-- /Gerar widget -->


<script type="text/javascript">

var idObj = "";

function reloadObjetos(){
	$("#ulListaObjetos").html("");
	$.ajax({
		url: "/bricks/objetos.json",
		type: "GET",
		dataType: "json",
		success: function(response){
			if (response) {
				objetos = response.objetos;
				for (i in objetos) {
				$("#ulListaObjetos").append("<li class=\"list-group-item\" onClick=\"editObject(" + objetos[i].Objeto.id + ");\" style=\"cursor:pointer;\">" + objetos[i].Objeto.nome + "</li>");
				}
			}
		}
	});
}

function editObject(id)
{
	
	$.ajax({
		url: "/bricks/objetos/" + id + ".json",
		type: "GET",
		dataType: "json",
		success: function(response){


			idObj = id;
			
			var objeto = response.objeto.Objeto;
			var campos = response.objeto.Campo;

			var ulListaCampos = $("<table>").addClass("table");
			ulListaCampos.append($("<tr>").append($("<th>").append("Campo")).append($("<th>").append("Tipo")));
			for (i in campos) {
				ulListaCampos.append($("<tr>").append($("<td>").append(campos[i].nome)).append($("<td>").append(campos[i].tipo)));
			}

			var div = $("<div>").addClass("panel panel-default").append(
				$("<div>").addClass("panel-heading").append(objeto.nome)
			). append(
				$("<div>").addClass("panel-body").append("<button type=\"button\" class=\"btn btn-primary pull-right\" data-toggle=\"modal\" data-target=\"#divFormCampo\">+</button>")
			).append(ulListaCampos);

			$("#divObjectEditor").html(div);
		}
	});
}

function salvarCampo(idObjeto)
{
	var nome = $("#txtNomeCampo").val();
	var tipo = $("#selTipoCampo").val();
	$.ajax({
		url: "/bricks/campos.json",
		data: "objeto_id=" + idObjeto + "&nome=" + nome + "&tipo=" + tipo,
		type: "POST",
		dataType: "json",
		success: function(response){
			editObject(idObjeto);
		}
	});
}

$(document).ready(function(){

	$("#btnSalvarNovoObjeto").click(function() {
		var nome = $("#txtNomeObjeto").val();
		$.ajax({
			url: "/bricks/objetos.json",
			data: "nome=" + nome,
			type: "POST",
			dataType: "json",
			success: function(response){
				reloadObjetos();
			}
		});
	});
	$("#btnSalvarNovoCampo").click(function(){
		salvarCampo(idObj);
	});

	$("#btnSalvarNovoWidget").click(function(){
		var nome = $("#txtNomeWidget").val();
		var tipo = $("#selTipoWidget").val();
		$.ajax({
			url: "/bricks/widgets.json",
			data: "nome=" + nome + "&tipo=" + tipo + "&objeto_id=" + idObj,
			type: "POST",
			dataType: "json",
			success: function(response){
				reloadObjetos();
			}
		});
	});
	
	reloadObjetos();
	
});
</script>