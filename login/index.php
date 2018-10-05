<?php 
include '../conexion/conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$user = $conexion->real_escape_string(htmlentities($_POST['usuario']));
	$pass = $conexion->real_escape_string(htmlentities($_POST['contra']));
	//para evitar que hagan sculinyeccion
	$candado = '';
	$str_usuario = strpos($user,$candado);
	$str_password = strpos($user,$candado);
	if (is_int($str_usuario)) {
		$user = '';
	}else{
		$usuario = $user;
	}

	if (is_int($str_password)) {
		$pass = '';
	}else{
		$pass2 = sha1($pass);
	}

	if ($user == null && $pass == null) {
		header('location:../extend/alerta.php?mensaje=El formato no es correcto&carpeta=salir&pagina=salir&tipo=error');
	}else{
		$sel = $conexion->query("SELECT nombre_usuario,nombre,nivel,password FROM usuarios WHERE nombre_usuario = '$usuario' AND password ='$pass2' AND bloqueo = 1 ");
		$row = mysqli_num_rows($sel);
			if ($row == 1) {
				if ($var = $sel->fetch_assoc()) {
					$nombre_usuario = $var['nombre_usuario'];
					$password = $var['password'];
					$nombre = $var['nombre'];
					$nivel = $var['nivel'];
				}

				if ($nombre_usuario == $usuario && $password == $pass2 && $nivel == 'ADMINISTRADOR') {
					# CREAR LAS VARIABLES DE SESSION
					$_SESSION['nombre_usuario'] = $nombre_usuario;
					$_SESSION['nombre'] = $nombre;
					$_SESSION['nivel'] = $nivel;
					header('location:../extend/alerta.php?mensaje=Bienvenido&carpeta=home&pagina=home&tipo=success');
				
				}elseif($nombre_usuario == $usuario && $password == $pass2 && $nivel == 'SUPERVISOR') {
					# CREAR LAS VARIABLES DE SESSION
					$_SESSION['nombre_usuario'] = $nombre_usuario;
					$_SESSION['nombre'] = $nombre;
					$_SESSION['nivel'] = $nivel;
					header('location:../extend/alerta.php?mensaje=Bienvenido&carpeta=home&pagina=home&tipo=success');
				}
				else {
					header('location:../extend/alerta.php?mensaje=No tienes permiso para acceder&carpeta=home&pagina=home&tipo=error');
				}				
				
			}else{
				header('location:../extend/alerta.php?mensaje=Nombre de usuario o contraseña incorrectos&carpeta=salir&pagina=salir&tipo=error');
				
			}
	}

}else{
	header('location:../extend/alerta.php?mensaje=Utiliza el formulario&carpeta=salir&pagina=salir&tipo=error');
}
?>