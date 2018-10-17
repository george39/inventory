<?php include '../extend/header.php';
include '../extend/permiso.php';
?>

<div class="container">
	<div class="row">
		<div class="col s12">
			<div class="card">
				<div class="card-content">
					<span class="card-title"><center>Ingreso de empleados al sistema</center></span>
					<form class="form" action="crear_empleado.php" method="post" enctype="multipart/form-data" autocomplete="off">
						<div class="input-field">
							<input type="text" name="nombre_empleado" id="nombre_empleado" required autofocus title="DIGITE AQUI EL NOMBRE DEL EMPLEADO" onblur="may(this.value, this.id)">
							<label for="nombre_empleado">Nombre empleado</label>
						</div>

						<div class="input-field">
							<input type="text" name="apellidos_empleado" id="apellidos_empleado" required title="DIGITE AQUI LOS APELLIDOS DEL EMPLEADO" onblur="may(this.value, this.id)">
							<label for="apellidos_empleado">Apellidos empleado</label>
						</div>
						
						<select class="" name="id_cargo" required>
							<option value="" disabled selected>ELIGE EL CARGO DEL EMPLEADO</option>
							<?php $sel=$conexion->prepare("SELECT * FROM cargos ");
							$sel->execute();
							$res = $sel->get_result();
							while ($f = $res->fetch_assoc()) {?>
								<option value="<?php echo $f['id_cargo'] ?>"><?php echo $f['nombre_cargo'] ?></option>
							<?php } 
							$sel->close();
							?>
						</select>
<div class="center">						
<button type="submit" class="btn blue" id="guardar">Guardar<i class="material-icons">send</i></button>
</div>									
					</form>	
				</div>
			</div>
		</div>
	</div>
</div>

<!--buscador de empleados-->
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

<?php $seleccionar = $conexion->query("SELECT * FROM empleados");
$row = mysqli_num_rows($seleccionar); 
?>

<div class="row">
	<div class="col s12">
		<div class="card">
			<div class="card-content">
				<span class="card-title">Empleados(<?php echo $row ?>)</span>
				<table>
					<thead>
						<tr class="cabecera">
							<th>Nombre</th>
							<th>Apellidos</th>
							<th>Cargo</th>
							<th>Eliminar</th>
						</tr>
					</thead>
					<?php while ($fila = $seleccionar->fetch_assoc()){ ?>
						<tr>
							<td><?php echo $fila['nombre_empleado'] ?></td>
							<td><?php echo $fila['apellidos_empleado'] ?></td>
							
							<td><?php $cargo = $conexion->query("SELECT * FROM cargos"); 
							?><?php while ($f = $cargo->fetch_assoc()) { ?>
								<?php if ($fila['id_cargo'] == $f['id_cargo']) {?>
									<?php echo $f['nombre_cargo'] ?>
								<?php } ?>	
								<?php } ?>
							</td>

							<td>
								<a href="#" class="btn-floating red" onclick="swal({
 								title: 'Esta seguro que desea eliminar el empleado?',
  								text: 'Al eliminarlo no podra recuperarlo',
  								type: 'warning', showCancelButton: true,
  								confirmButtonColor: '#3085d6', cancelButtonColor: '#d33',
  								confirmButtonText: 'Si, eliminarlo'
								}).then(function () { location.href='eliminar_empleado.php?id_empleado=<?php echo $fila['id_empleado'] ?>'; })"><i class="material-icons">clear</i></a>
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