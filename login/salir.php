<?php @session_start();
$_SESSION = array(); //para limpiar todas las variables de sesion
session_destroy();
header("location:../comienzo");
?>