<?php 
function getConn(){
	$mysqli = mysqli_connect('localhost', 'root', '', 'alpaca');
	if (mysqli_connect_errno($mysqli)) 
		echo "Fallo la conexion" . mysqli_connect_errno();
	$mysqli->set_charset('utf8');
	return $mysqli;
	
}