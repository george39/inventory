<?php 
include '../conexion/conexion.php';
if (isset($_POST["id_troquelado"])) 
{
	$id_troquelado = $_POST["id_troquelado"];
	$id_tarea = $_POST["id_tarea"];
	$referencia = $_POST["referencia"];	
	$talla = $_POST["talla"];
	//$fecha = ''; //$_POST["fecha"];	
	$id_empleado = $_POST["id_empleado"];
	$query = '';
	for ($count=0; $count <count($id_troquelado) ; $count++) { 
		$id_troquelado_clean = mysqli_real_escape_string($conexion, $id_troquelado[$count]);
		$id_tarea_clean = mysqli_real_escape_string($conexion, $id_tarea[$count]);
		$referencia_clean = mysqli_real_escape_string($conexion, $referencia[$count]);
		$talla_clean = mysqli_real_escape_string($conexion, $talla[$count]);
		//$fecha_clean = mysqli_real_escape_string($conexion, $fecha[$count]);		
		$id_empleado_clean = mysqli_real_escape_string($conexion, $id_empleado[$count]);
		if ($id_troquelado_clean != '' && $id_tarea_clean !='' && $referencia_clean !='' && $talla_clean !=''  && $id_empleado_clean !='') 
		{
			$query .= '
			INSERT INTO troquelado(id_troquelado, id_tarea, referencia, talla, id_empleado)
			VALUES("'.$id_troquelado_clean.'", "'.$id_tarea_clean.'", "'.$referencia_clean.'", "'.$talla_clean.'", "'.$id_empleado_clean.'");
			';
		}
	}
	if ($query != '') {	
		if (mysqli_multi_query($conexion, $query)) {
			echo "LA ORDER FUE GUARDADA CORRECTAMENTE";

		}else{
			echo "LA ORDEN NO PUDO SER GUARDADA";
			
		}
	}else{
		echo "Uliliza el formulario";
		}
}
	

?>












