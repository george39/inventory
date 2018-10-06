<?php 
include '../conexion/conexion.php';
include '../extend/permiso.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$id_usuario = $conexion->real_escape_string(htmlentities($_POST['id_usuario']));
	$nivel = $conexion->real_escape_string(htmlentities($_POST['nivel']));
$actualizacion = $conexion->query("UPDATE usuarios SET nivel='$nivel' WHERE id_usuario=$id_usuario");
if ($actualizacion) {
	header('location:../extend/alerta.php?mensaje=Nivel actualizado&carpeta=usuario&pagina=index&tipo=success');
}else{
	header('location:../extend/alerta.php?mensaje=El nivel del usuario no pudo ser actualizado&carpeta=usuario&pagina=index&tipo=error');
}

}else{
	header('location:../extend/alerta.php?mensaje=Utiliza el formulario&carpeta=usuario&pagina=index&tipo=error');
}
$conexion->close();
?>