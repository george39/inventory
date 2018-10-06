<?php include '../conexion/conexion.php';
$id_usuario = $conexion-> real_escape_string(htmlentities($_GET['id_usuario']));

$borrar = $conexion->query("DELETE FROM usuarios WHERE id_usuario=$id_usuario ");

if ($borrar) {
	header('location:../extend/alerta.php?mensaje=Usuario eliminado&carpeta=usuario&pagina=index&tipo=success');
}else {
	header('location:../extend/alerta.php?mensaje=El suario no pudo ser eliminado&carpeta=usuario&pagina=index&tipo=error');
}
$conexion->close();

?>