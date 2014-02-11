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
					
					<div id="divObjectEditor"></div>
					
				</div>
			</div>
		</div>
	</div>
</div>

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
						<label for="exampleInputEmail1">Nome</label>
						<input type="text" class="form-control" id="txtNomeObjeto" placeholder="Ex: Cliente">
					</div>
				</form>
				
			</div>
			
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
				<button type="button" class="btn btn-primary" id="btnSalvarNovoObjeto">Salvar</button>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">

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
			var objeto = response.objeto.Objeto;
			var campos = response.objeto.Campo;

			var ulListaCampos = $("<ul>").addClass("list-group");

			for (i in campos) {
				ulListaCampos.append($("<li>").addClass("list-group-item").append(campos[i].nome));
			}

			var div = $("<div>").addClass("panel panel-default").append(
				$("<div>").addClass("panel-heading").append(objeto.nome)
			). append(
				$("<div>").addClass("panel-body").append(ulListaCampos)
			);

			$("#divObjectEditor").html(div);
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
	
	reloadObjetos();
	
});
</script>