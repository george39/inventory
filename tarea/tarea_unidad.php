<?php include '../extend/header.php';
?>

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

<?php $selec = $conexion->query("SELECT * FROM tarea_unidad");
$row = mysqli_num_rows($selec);

?>

<div class="row">
	<div class="col s12">
		<div class="card">
			<div class="card-content">
				<span class="card-title"><center>Tarea por unidades</center></span>
					<table>
						<thead>
							<tr class="cabecera">
								<th>Nombre</th>
								<th>Referencia</th>
								<th>Talla</th>
								<th>Codigo barras</th>
								<th>fecha</th>
								<th>Id tarea</th>
							</tr>
						</thead>
						<?php while ($fila = $selec->fetch_assoc()) {?>
							<tr>
								<td><?php echo $fila['nombre'] ?></td>
								<td><?php echo $fila['referencia'] ?></td>
								<td><?php echo $fila['talla'] ?></td>
								<td><?php echo $fila['codigo_barras'] ?></td>
								<td><?php echo $fila['fecha'] ?></td>
								<td><?php echo $fila['id_tarea'] ?></td>
							</tr>
						<?php } 
						$selec->close();
						$conexion->close();
						?>
					</table>
			</div>
		</div>
	</div>
</div>


<?php include '../extend/scripts.php'; ?>
<script src="../js/validacion.js"></script>