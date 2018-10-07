<?php include '../extend/header.php'; ?>

<div class="container">
	<div class="row">
		<div class="col s12">
			<div class="card">
				<div class="card-content">
					<span class="card-title"><center>Generar tarea</span>
						<form class="form" action="generar_tarea.php" method="post" enctype="multipart/form-data" autocomplete="off">
							<div class="input-field">
								<input type="text" name="nombre_tarea" id="nombre_tarea" required autofocus title="DIGITE AQUI EL NOMBRE DE LA TAREA" onblur="may(this.value, this.id)">
								<label for="nombre_tarea">Nombre tarea</label>
							</div>

							<div class="input-field">
								<input type="text" name="talla" id="talla" required title="DIGITE AQUI LA TALLA DE LA REFERENCIA">
								<label for="talla">Talla</label>
							</div>

							<div class="input-field">
								<input type="number" name="cantidad" id="cantidad" required title="DIGITE AQUI LA CANTIDAD DE LA TAREA">
								<label for="cantidad">Cantidad</label>
							</div>

							<select name="codigo_referencia" required>
								<option disabled selected>ELIJA LA REFERENCIA</option>
								<?php $sele = $conexion->prepare("SELECT * FROM referencias");
								$sele->execute();
								$resultado = $sele->get_result();
								while ($f = $resultado->fetch_assoc()) { ?>
									<option value="<?php echo $f['id_referencia'] ?>"><?php echo $f['id_referencia'] ?></option>
								<?php } 
								$sele->close();
								 ?>								
							</select>
<button type="submit" id="guardar" class="btn blue">Guardar<i class="material-icons">send</i></button>													
						</form>
				</div>
			</div>
		</div>
	</div>
</div>

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


<?php include '../extend/scripts.php'; ?>
<script src="../js/validacion.js"></script>