
<?php 
include '../conexion/conexion.php';


$id_tarea = $conexion->real_escape_string(htmlentities($_GET['id_tarea']));
$selec = $conexion->query("SELECT * FROM tarea_unidad WHERE id_tarea=$id_tarea");

while ($row = $selec->fetch_assoc()) {
	

?>

<img src="barcode.php?text=<?php echo $row['codigo_barras']; ?>&size=50&orientation=horizontal&codetype=Code128&print=true&sizefactor=2">
</table>

<br>
<?php } ?>

<!--para que no se vea el boton imprimir -->

<style type="text/css" media="print">
.nover {display:none}
</style>


<input type="button" name="imprimir" value="Imprimir" class="nover" onClick="window.print();"/>



