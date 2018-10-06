<!--PARA BLOQUEAR AUTOMATICAMENTE UN USUARIO  -->
<?php
if ($_SESSION['nivel'] != 'ADMINISTRADOR') {
	header("location:bloqueo.php");
}
?>