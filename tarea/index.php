<?php include '../extend/header.php'; ?>

<div class="container">
	<div class="row">
		<div class="col s12">
			<div class="card">
				<div class="card-content">
					<span class="card-title"><center>Generar tarea</center></span>
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

							 <div class="input-field">
				              <!-- Se inicializa-->
				              <input type="datetime" class="datepicker" name="fecha_registro" id="fecha_registro" required value="<?php echo date("Y-m-d H:i");?>">
				              <label for="fecha_registro">Fecha de registro</label>
				            </div>

							<select name="referencia" required>
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
<div class="center">							
<button type="submit" id="guardar" class="btn blue">Guardar<i class="material-icons">send</i></button>
</div>													
						</form>
				</div>
			</div>
		</div>
	</div>
</div>

	<!--buscador de tareas -->
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

<?php  $seleccionar = $conexion->query("SELECT * FROM generar_tarea");
$row = mysqli_num_rows($seleccionar);
?>

<div class="row">
	<div class="col s12">
		<div class="card">
			<div class="card-content">
				<span class="card-title">Tareas(<?php echo $row ?>)</span>
				<table>
					<thead>
						<tr class="cabecera">
							<th>Nombre tarea</th>
							<th>Talla</th>
							<th>Cantidad</th>
							<th>Referencia</th>
							<th>Fecha</th>
							<th>Generear código</th>
						</tr>
					</thead>
					<?php while ($fila = $seleccionar->fetch_assoc()) { ?>
						<tr>
							<td><?php echo $fila['nombre'] ?></td>
							<td><?php echo $fila['talla'] ?></td>
							<td><?php echo $fila['cantidad'] ?></td>
							<td><?php echo $fila['id_referencia'] ?></td>
							<td><?php echo date('d-m-Y H:i', strtotime($fila['fecha'])) ?></td>
							<td><a href="../codigo_barras?id_tarea=<?php echo $fila['id_tarea'] ?>"  class="btn-floating blue" target="_blank"><i class="material-icons">view_week</i></a></td>

							
						</tr>

					<?php } 
					$seleccionar->close();
					$conexion->close();
					?>
				</table>
			</div>
		</div> 
	</div>
</div>


<?php include '../extend/scripts.php'; ?>
<script src="../js/validacion.js"></script>

<script>
	$('.modal').modal();

	function enviar(valor){
		$.get('../codigo_barras',{
			id_tarea:valor,

			beforeSend: function(){
				$('.res_modal').html("Espere un momento por favor");
			}
		}, function(respuesta){
			$('.res_modal').html(respuesta);			
		});
	}
</script>