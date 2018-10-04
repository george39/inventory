<?php 
include '../conexion/conexion.php';

#escapamos la variable conexion para no tener problemas con sqlinyeccion
$nombre_usuario = $conexion->real_escape_string($_POST['nombre_usuario']);

$sel = $conexion->query("SELECT id_usuario FROM usuarios WHERE nombre_usuario ='$nombre_usuario' " );
$row = mysqli_num_rows($sel);
if ($row != 0) {
	echo "<label style='color:red'>El nombre de usuario ya existe</label>";
}else{
	echo "<label style='color:green'>El nombre de usuario esta disponible</label>";
}
$conexion->close();
?>