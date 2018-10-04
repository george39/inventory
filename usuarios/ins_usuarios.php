<?php 
include '../conexion/conexion.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$nombre_usuario = $conexion->real_escape_string(htmlentities($_POST['nombre_usuario']));
	$pass1 = $conexion->real_escape_string(htmlentities($_POST['pass1']));
	$nivel = $conexion->real_escape_string(htmlentities($_POST['nivel']));
	$nombre = $conexion->real_escape_string(htmlentities($_POST['nombre']));

	//validaciones del formulario desde el lado de php 
	if (empty($nombre_usuario) || empty($pass1) || empty($nivel) || empty($nombre)) {
		header('location:../extend/alerta.php?mensaje=Hay un campo sin especificar&carpeta=usuarios&pagina=index&tipo=error');
		exit;
	}
	if (!ctype_alpha($nivel)) {
		header('location:../extend/alerta.php?mensaje=El nivel no contiene solo letras&carpeta=usuarios&pagina=index&tipo=error');
		exit;
	}

	//para permitir espacios y carateres especiales en el campo nombre de la persona
	$careacteres = "ABCDEFGHIJKLMNÑOPQ ";
	for ($i=0; $i < strlen($nombre) ; $i++) { 
		$buscar = substr($nombre,$i,1);
		if (strpos($careacteres,$buscar) ===false) {
			header('location:../extend/alerta.php?mensaje=El nombre no contiene solo letras&carpeta=usuarios&pagina=index&tipo=error');
			exit;
		}
	}

	//validacion del nombre de usuario 
	$usuario = strlen($nombre_usuario);
	$contrasenya = strlen($pass1);

	if ($usuario < 4 || $usuario > 10) {
		header('location:../extend/alerta.php?mensaje=El nombre de usuario debe contener entre 4 y 10 caracteres&carpeta=usuarios&pagina=index&tipo=error');
		exit;
	}

	//validacion para la contraseña
	if ($contrasenya <4 || $contrasenya >10) {
		header('location:../extend/alerta.php?mensaje=La contraseña debe contener entre 4 y 10 caracteres&carpeta=usuarios&pagina=index&tipo=error');
		exit;
	}
}else{
	header('location:../extend/alerta.php?mensaje=Utiliza el formulario&carpeta=usuarios&pagina=index&tipo=error');
}
?>