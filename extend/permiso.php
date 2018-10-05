<!--PARA BLOQUEAR AUTOMATICAMENTE UN USUARIO  -->
<?php
if ($_SESSIO['nivel'] != 'ADMINISTRADOR') {
	header("location:bloqueo.php");
}