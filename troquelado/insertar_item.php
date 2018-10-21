<?php include '../conexion/conexion.php'; 

$tabla = '';
$query = "SELECT * FROM tarea_unidad ";
if (isset($_POST['codigo'])) {
	$codigo = $conexion->real_escape_string($_POST['codigo']);
	$query = "SELECT * FROM tarea_unidad WHERE
	codigo_barras = '$codigo'";	

}

$buscarAlumnos = $conexion->query($query);
if ($buscarAlumnos->num_rows < 10) {
	$tabla.= '
	<table class="table">
	 <tr class="bg-primary">
	 	<td>Codigo</td>
	 	<td>No tarea</td>
	 	<td>Referencia</td>
	 	<td>Talla</td>
	 	<td>fecha</td>
	 	<td>Operario</td>
	 </tr>	
	';

while($row = $buscarAlumnos->fetch_assoc())
{

	$tabla .=
	'<tr>		
		<td><input size="3" id="codigo_barras" value="'.$row['codigo_barras'].'"</inpurt></td>
		<td><input size="3" id="id_tarea" value="'.$row['id_tarea'].'"</input></td>
		<td><input size="3" id="referencia" value="'.$row['referencia'].'"</input></td>
		<td><input size="3" id="talla" value="'.$row['talla'].'"</input></td>
		<td><input size="3" id="fecha" value="'.$row['fecha'].'"</input></td>
		<td><input size="3" id="id_operario" value="'.$row['id_empleado'].'"</input></td>
			

	</tr>	
	';
}
$tabla .='</table>';

}else  {
	//$tabla="No hay registros";
	
}


echo $tabla;

?>





