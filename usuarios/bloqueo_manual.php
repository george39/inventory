<?php 
include '../conexion/conexion.php';
$id_usuario = $conexion->real_escape_string(htmlentities($_GET['us']));
$bloqueo = $conexion->real_escape_string(htmlentities($_GET['bl']));

if ($bloqueo == 1) {
	$actualizacion = $conexion->query("UPDATE usuarios SET bloqueo=0 WHERE id_usuario='$id_usuario'");
	if ($actualizacion) {
		header('location:../extend/alerta.php?mensaje=El usuario ha sido bloqueado&carpeta=usuario&pagina=index&tipo=success');
	}else {
		header('location:../extend/alerta.php?mensaje=El usuario no ha sido bloqueado&carpeta=usuario&pagina=index&tipo=error');
	}
}else {
	$actualizacion = $conexion->query("UPDATE usuarios SET bloqueo=1 WHERE id_usuario='$id_usuario'");
	if ($actualizacion) {
		header('location:../extend/alerta.php?mensaje=El usuario ha sido desbloqueado&carpeta=usuario&pagina=index&tipo=success');
	}else {
		header('location:../extend/alerta.php?mensaje=El usuario no ha sido desbloqueado&carpeta=usuario&pagina=index&tipo=error');
	}
}

?>