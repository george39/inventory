<?php include '../conexion/conexion.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$nombre_empleado = htmlentities($_POST['nombre_empleado']);
	$apellidos_empleado = htmlentities($_POST['apellidos_empleado']);
	$cargo = htmlentities($_POST['id_cargo']);
	$id_empleado = '';

	$insertar = $conexion->prepare("INSERT INTO empleados VALUES(?,?,?,?) ");
	$insertar->bind_param("issi", $id_empleado, $nombre_empleado, $apellidos_empleado, $cargo);
	
	if ($insertar->execute()) {
		header('location:../extend/alerta.php?mensaje=Empleado registrado&carpeta=empleado&pagina=index&tipo=success');
	}else {
		header('location:../extend/alerta.php?mensaje=El empleado no pudo ser registrado&carpeta=empleado&pagina=index&tipo=error');
	}

	$insertar->close();
	$conexion->close();
}else{
	header('location:../extend/alerta.php?mensaje=Utiliza el formulario&carpeta=empleado&pagina=index&tipo=error');
}
?>