<?php include '../conexion/conexion.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$id_referencia = htmlentities($_POST['id_referencia']);
	$nombre_referencia = htmlentities(($_POST['nombre_referencia']));

	$insertar = $conexion->prepare("INSERT INTO referencias VALUES(?,?)");
	$insertar->bind_param("ss", $id_referencia, $nombre_referencia);

	if ($insertar->execute()) {
		header('location:../extend/alerta.php?mensaje=La referecia fue creada&carpeta=referencia&pagina=index&tipo=success');
	}else {
		header('location:../extend/alerta.php?mensaje=La referencia no pudo ser creada&carpeta=referencia&pagina=index&tipo=error');
	}

	$insertar->close();
	$conexion->close();
}else {
	header('location:../extend/alerta.php?mensaje=Utiliza el formulario&carpeta=referencia&pagina=index&tipo=error');
}
?>