<?php include '../conexion/conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$nombre_tarea = htmlentities($_POST['nombre_tarea']);
	$talla = htmlentities($_POST['talla']);
	$cantidad = htmlentities($_POST['cantidad']);
	$referencia = htmlentities($_POST['referencia']);
	$fecha = htmlentities($_POST['fecha_registro']);
	$id_tarea = '';

	$insertar = $conexion->prepare("INSERT INTO generar_tarea VALUES(?,?,?,?,?,?)");
	$insertar->bind_param("ississ", $id_tarea, $nombre_tarea, $talla, $cantidad, $fecha, $referencia);
	if ($insertar->execute()) {
		header('location:../extend/alerta.php?mensaje=La tarea fue creada&carpeta=tarea&pagina=index&tipo=success');
	}else {
		header('location:../extend/alerta.php?mensaje=La tarea no fue creada&carpeta=tarea&pagina=index&tipo=error');
	}
	$insertar->close();
	$conexion->colose();

}else {
	header('location:../extend/alerta.php?mensaje=Utiliza el formulario&carpeta=tarea&pagina=index&tipo=error');
}

?>