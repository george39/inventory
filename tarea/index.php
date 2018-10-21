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
				              <input type="datetime" class="datepicker" name="fecha_registro" id="fecha_registro" required value="<?php echo date("Y-m-d H:i");?>">		              
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


							<select name="id_empleado" required>
								<option disabled selected>ELIJA EL OPERARIO</option>
								<?php $sele = $conexion->prepare("SELECT * FROM empleados");
								$sele->execute();
								$resultado = $sele->get_result();
								while ($f = $resultado->fetch_assoc()) { ?>
									<option value="<?php echo $f['id_empleado'] ?>"><?php echo $f['nombre_empleado'] ?></option>
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
							<th>Referencia</th>
							<th>Talla</th>							
							<th>Fecha</th>
							<th>Operario</th>
							
						</tr>
					</thead>
					<?php while ($fila = $seleccionar->fetch_assoc()) { 
						$id = $fila['id_empleado']; ?>
						<tr>
							<td><?php echo $fila['nombre_tarea'] ?></td>
							<td><?php echo $fila['id_referencia'] ?></td>
							<td><?php echo $fila['talla'] ?></td>				
							<td><?php echo date('d-m-Y H:i', strtotime($fila['fecha'])) ?></td>							

							<td><?php $selec = $conexion->prepare("SELECT * FROM empleados WHERE id_empleado ='$id' ");
				              $selec->execute();
				              $res = $selec->get_result();
				              while ($c = $res->fetch_assoc()) { ?>
				               <?php echo $c['nombre_empleado'] ?>
				                <?php }
				                $selec->close();
				                ?>
				              </td>

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

