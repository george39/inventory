<?php include '../extend/header.php'; 
include '../extend/permiso.php';
?>
<div class="container">
<div class="row">
	<div class="col s12">
		<div class="card">
			<div class="card-content">
				<span class="card-title">Creacion de usuarios</span>
				<form class="form" action="ins_usuarios.php" method="post" enctype="multipart/form-data" autocomplete="off">
					<div class="input-field">
						<input type="text" name="nombre_usuario" required autofocus title="DEBE DE TENER MAS DE 4 CAREACTERES, NUMEROS O LETRAS" pattern="[A-Za-z0-9]{4,15}" id="nombre_usuario" onblur="may(this.value, this.id)"> <!--onblur es para convertir todo a mayusculas -->
						<label for="nombre_usuario">Nombre usuario</label>
					</div>
					<!--para validar si el usuario existe o no en la bd -->
					<div class="validacion"></div>

					<!--PARA VALIDAR LA CONTRASEÑA -->
					<div class="input-field">
						<input type="password" name="pass1" title="CONTRASEÑA CON NUMEROS Y LETRAS"  id="pass1" required>
						<label for="pass1">Contraseña</label>
					</div>

					<!--PARA VERIFICAR LA CONTRASEÑA -->
					<div class="input-field">
						<input type="password" title="CONTRASEÑA CON NUMEROS Y LETRAS"  id="pass2" required>
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
</div>

<!--Buscador de usuarios -->
<div class="row">
	<div class="col s12">
		<nav class="blue lighten-2">
			<div class="input-field">
				<input type="search" id="buscar" autocomplete="off">
				<label for="buscar"><i class="material-icons">search</i></label>
				<i class="material-icons">close</i>
			</div>
		</nav>
	</div>
</div>

<?php $seleccionar = $conexion->query("SELECT * FROM usuarios");
$row = mysqli_num_rows($seleccionar); 

?>
<div class="row">
	<div class="col s12">
		<div class="card">
			<div class="card-content">
				<span class="card-title">Usuarios (<?php echo $row ?>)</span>
				<table>
					<thead>
						<tr class="cabecera">
						<th>Nombre usuario</th>
						<th>Nombre</th>
						<th>Nivel</th>
						<th></th>
						<th>Bloqueo</th>
						<th>Eliminar</th>
						
						</tr>
					</thead>
					<?php while($fila = $seleccionar->fetch_assoc()){ ?>
						<tr>
							<td><?php echo $fila['nombre_usuario'] ?></td>
							<td><?php echo $fila['nombre'] ?></td>
							<td>
								<form action="actualizar_nivel.php" method="post">
									<input type="hidden" name="id_usuario" value="<?php echo $fila['id_usuario'] ?>">
									<select name="nivel" required>
										<option value="<?php echo $fila['nivel'] ?>"><?php echo $fila['nivel'] ?></option>
										<option value="ADMINISTRADOR">ADMINISTRADOR</option>
										<option value="SUPERVISOR">SUPERVISOR</option>
									</select>
								</td>
								<td>
									<button type="submit" class="btn-floating"><i class="material-icons">repeat</i></button>						
								</form>
								</td>	
							<td>
								<!--bloquear y desbloquear usuarios manualmente -->
							<?php if ($fila['bloqueo']==1): ?>
								<a href="bloqueo_manual.php?us=<?php echo $fila['id_usuario'] ?>&bl=<?php echo $fila['bloqueo'] ?>"><i class="material-icons green-text">lock_open</i></a>
							<?php else: ?>
								<a href="bloqueo_manual.php?us=<?php echo $fila['id_usuario'] ?>&bl=<?php echo $fila['bloqueo'] ?>"><i class="material-icons red-text">lock_outline</i></a>
							<?php endif; ?>

							</td>
							<td>
								<a href="#" class="btn-floating red" onclick="swal({
 								title: 'Esta seguro que desea eliminar el usuario?',
  								text: 'Al eliminarlo no podra recuperarlo',
  								type: 'warning', showCancelButton: true,
  								confirmButtonColor: '#3085d6', cancelButtonColor: '#d33',
  								confirmButtonText: 'Si, eliminarlo'
								}).then(function () { location.href='eliminar_usuario.php?id_usuario=<?php echo $fila['id_usuario'] ?>'; })"><i class="material-icons">clear</i></a>
							</td>							
						</tr>
					<?php } ?>
				</table>
			</div>
		</div>
	</div>
</div>

<?php include '../extend/scripts.php'; ?>
<script src="../js/validacion.js"></script>