<?php 
include '../conexion/conexion.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$nombre_usuario = $conexion->real_escape_string(htmlentities($_POST['nombre_usuario']));
	$pass1 = $conexion->real_escape_string(htmlentities($_POST['pass1']));
	$nivel = $conexion->real_escape_string(htmlentities($_POST['nivel']));
	$nombre = $conexion->real_escape_string(htmlentities($_POST['nombre']));

	//validaciones del formulario desde el lado de php 
	if (empty($nombre_usuario) || empty($pass1) || empty($nivel) || empty($nombre)) {
		header('location:../extend/alerta.php?mensaje=Hay un campo sin especificar&carpeta=usuario&pagina=index&tipo=error');
		exit;
	}
	if (!ctype_alpha($nivel)) {
		header('location:../extend/alerta.php?mensaje=El nivel no contiene solo letras&carpeta=usuario&pagina=index&tipo=error');
		exit;
	}

	//para permitir espacios y carateres especiales en el campo nombre de la persona
	$caracteres = "ABCDEFGHIJKLMNOPQRSTUVWXYZ ";
	for ($i=0; $i < strlen($nombre) ; $i++) { 
		$buscar = substr($nombre,$i,1);
		if (strpos($caracteres,$buscar) ===false) {
			header('location:../extend/alerta.php?mensaje=El nombre no contiene solo letras&carpeta=usuario&pagina=index&tipo=error');
			exit;
		}
	}

	//validacion del nombre de usuario 
	$usuario = strlen($nombre_usuario);
	$contrasenya = strlen($pass1);

	if ($usuario < 4 || $usuario > 15) {
		header('location:../extend/alerta.php?mensaje=El nombre de usuario debe contener entre 4 y 15 caracteres&carpeta=usuario&pagina=index&tipo=error');
		exit;
	}

	//validacion para la contraseña
	if ($contrasenya < 4 || $contrasenya >15) {
		header('location:../extend/alerta.php?mensaje=La contraseña debe contener entre 4 y 10 caracteres&carpeta=usuario&pagina=index&tipo=error');
		exit;
	}

	//guardar los datos en la bd
	$pass1= sha1($pass1);
	$guardar = $conexion->query("INSERT INTO usuarios VALUES('','$nombre_usuario','$pass1','$nombre','$nivel',1)");
	if ($guardar) {
		header('location:../extend/alerta.php?mensaje=El usuario se creo correctamente&carpeta=usuario&pagina=index&tipo=success');
	}else {
		header('location:../extend/alerta.php?mensaje=El usuario no fue creado&carpeta=usuario&pagina=index&tipo=error');
	}

	$conexion->close();
}else{
	header('location:../extend/alerta.php?mensaje=Utiliza el formulario&carpeta=usuario&pagina=index&tipo=error');
}
?>