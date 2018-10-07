<?php include '../extend/header.php'; 

?>

<div class="container">
	<div class="row">
		<div class="col s12">
			<div class="card">
				<div class="card-content">
					<span class="card-title"><center>Ingreso de referencias</span>
						<form class="form" action="crear_referencia.php" method="post" enctype="multipart/form-data" onautocomplete="off">
							<div class="input-field">
								<input type="text" name="id_referencia" id="id_referencia" required autofocus title="DIGITE AQUI LA REFERENCIA">
								<label for="id_referencia">Codigo de la referencia</label>
							</div>

							<div class="input-field">
								<input type="text" name="nombre_referencia" id="nombre_referencia" required title="DIGITE AQUI EL NOMBRE DE LA REFERENCIA" onblur="may(this.value, this.id)">
								<label for="nombre_referencia">Nombre referencia</label>
							</div>

	<button type="submit" class="btn blue" id="guardar">Guardar<i class="material-icons">send</i></button>						
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

<?php $seleccionar = $conexion->query("SELECT * FROM referencias");
$row = mysqli_num_rows($seleccionar);
?>

<div class="row">
	<div class="col s12">
		<div class="card">
			<div class="card-content">
				<span class="card-title">Referencias(<?php echo $row ?>)</span>
				<table>
					<thead>
						<tr class="cabecera">
							<th>Codigo</th>
							<th>Nombre</th>
						</tr>
					</thead>
					<?php while ($fila = $seleccionar->fetch_assoc()) { ?>
						<tr>
							<th><?php echo $fila['id_referencia'] ?></th>
							<th><?php echo $fila['nombre_referencia'] ?></th>
						</tr>
					<?php } ?>
				</table>
			</div>
		</div>
	</div>
</div>

<?php include '../extend/scripts.php'; ?>
<script src="../js/validacion.js"></script>