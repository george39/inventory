<?php include '../conexion/conexion.php';
$id_empleado = $conexion-> real_escape_string(htmlentities($_GET['id_empleado']));

$borrar = $conexion->query("DELETE FROM empleados WHERE id_empleado='$id_empleado' ");

if ($borrar) {
	header('location:../extend/alerta.php?mensaje=Empleado eliminado&carpeta=empleado&pagina=index&tipo=success');
}else {
	header('location:../extend/alerta.php?mensaje=El empleado no pudo ser eliminado&carpeta=empleado&pagina=index&tipo=error');
}
$conexion->close();

?>