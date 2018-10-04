<?php include '../extend/header.php'; ?>

<div class="row">
	<div class="col s4">
		<div class="card">
			<div class="card-content">
				<span class="card-title">Creacion de usuarios</span>
				<form class="form" action="ins_usuarios" method="post">
					<div class="input-field">
						<input type="text" name="nombre_usuario" required autofocus title="DEBE DE TENER MAS DE 4 CAREACTERES, NUMEROS O LETRAS" pattern="[A-Za-z0-9]{4,10}" id="nombre_usuario" onblur="may(this.value, this.id)"> <!--onblur es para convertir todo a mayusculas -->
						<label for="nombre_usuario">Nombre usuario</label>
					</div>
					<!--para validar si el usuario existe o no en la bd -->
					<div class="validacion"></div>

					<!--PARA VALIDAR LA CONTRASEÑA -->
					<div class="input-field">
						<input type="password" name="pass1" title="CONTRASEÑA CON NUMEROS Y LETRAS" pattern="[A-Za-z0-9]" id="pass1" required>
						<label for="pass1">Contraseña</label>
					</div>

					<!--PARA VERIFICAR LA CONTRASEÑA -->
					<div class="input-field">
						<input type="password" title="CONTRASEÑA CON NUMEROS Y LETRAS" pattern="[A-Za-z0-9]" id="pass2" required>
						<label for="pass2">Verificar contraseña</label>
					</div>

					<!--PARA ELEGIR EL NIVEL DE USUARIO -->
					<!--Nota: para que el select se vea hay que inicializarlo con materialice -->
					<select name="nivel" required>
						<option value="" disabled selected>ELIGE UN NIVEL DE USUARIO</option>
						<option value="ADMINISTRADOR">ADMINISTRADOR</option>
						<option value="SUPERVISOR">SUPERVISOR</option>
					</select>

					<div class="input-field">
						<input type="text" name="nombre" title="Nombre del usuario" id="nombre" onblur="may(this.value, this.id)" required pattern="[A-Z/s ]+"><!--esto permite escribir letras con espacios -->
						<label for="nombre">Nombre completo del usuario</label>
					</div>
	<button type="submit" class="btn blue" id="btn_guardar">Guardar<i class="material-icons">send</i></button>				
				</form>
			</div>
		</div>
	</div>
</div>

<?php include '../extend/scripts.php'; ?>
<script src="../js/validacion.js"></script>