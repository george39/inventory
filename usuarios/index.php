<?php include '../extend/header.php'; ?>

<div class="row">
	<div class="col s12">
		<div class="card">
			<div class="card-content">
				<span class="card-title">Creacion de usuarios</span>
				<form class="form" action="ins_usuarios" method="post">
					<div class="input-field">
						<input type="text" name="nombre_usuario" required autofocus title="DEBE DE TENER MAS DE 5 CAREACTERES" pattern="[A-Aa-z]{5,10}" id="nombre_usuario" onblur="may(this.value, this.id)"> <!--onblur es para convertir todo a mayusculas -->
						<label for="nombre_usuario">Nombre usuario</label>
					</div>
					<!--para validar si el usuario existe o no en la bd -->
					<div class="validacion"></div>

				</form>
			</div>
		</div>
	</div>
</div>

<?php include '../extend/scripts.php'; ?>

<!--metodo ajax para validar si el usuario esta disponible o no en la bd -->
<script>
	$('#nombre_usuario').change(function(){
		$.post('ajax_validacion_nombre_usuario.php',{
			nombre_usuario:$('#nombre_usuario').val(),
			beforeSend: function(){
				$('.validacion').html("Espere un momento por favor");
			}
		}, function(respuesta){
			$('.validacion').html(respuesta);
			});		
	});
</script>