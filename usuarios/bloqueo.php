<?php 
include '../conexion/conexion.php';
$user = $_SESSION['nombre_usuario'];

$up = $conexion->query("UPDATE usuarios SET bloqueo=0 WHERE nombre_usuario='$user' ");
if ($up) {
	$_SESSION = array();
	session_destroy();
	header('location:../extend/alerta.php?mensaje=USO INDEVIDO DEL SISTEMA&carpeta=salir&pagina=salir&tipo=error');
}

?>