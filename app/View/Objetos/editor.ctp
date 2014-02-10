<?php
?>

<div class="container">
	<div class="row">
	
		<div class="col-md-4">
			<div class="panel panel-default">
				<div class="panel-body">
					
					<div id="divListaObjetos">
					</div>
				
				</div>
			</div>
		</div>
		
		<div class="col-md-8">
			<div class="panel panel-default">
				<div class="panel-body">
					Basic panel example
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
$(document).ready(function(){
	$.ajax({
		url: "/bricks/objetos.json",
		type: "GET",
		dataType: "json",
		success: function(response){
			$("#divListaObjetos").html(response);
		}
	});
});
</script>