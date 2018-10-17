<?php
include '../conexion/conexion.php';		
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$buscar = htmlentities($_POST['buscar1']);
	


	$sel_id = $conexion->prepare("SELECT * FROM tarea_unidad WHERE codigo_barras = ?");
	$sel_id->bind_param('s', $buscar);
	$sel_id->execute();
	$res_id = $sel_id->get_result();
	$row = mysqli_num_rows($res_id);
	
?>

<?php while ($f = $res_id->fetch_assoc()) { ?>
<?php $id = $f['codigo_barras']; ?>
         	
      
            <td contenteditable="true" class="id_troquelado"><?php echo $buscar ?></td>         
          	<td contenteditable="true" class="id_tarea"><?php echo $f['id_tarea'] ?></input></td> <!-- -->
            <td contenteditable="true" class="referencia"><?php echo $f['referencia'] ?></td>
            <td contenteditable="ture" class="talla"><?php echo $f['talla'] ?></td> <!-- -->
            <td contenteditable="true" class="fecha"><?php echo $f['fecha'] ?></td><!--<?php #echo $f['valorpublico'] ?> --> 
            <td contenteditable="true" class="id_tarea_unidad"><?php echo $f['id_tarea_unidad'] ?></td> 
            <td contenteditable="true" class="id_empleado"><?php echo $f['id_tarea_unidad'] ?></td>       
          <?php }
         
          $conexion->close();
          ?>
         
    


  <?php include '../extend/scripts.php'; ?>
<?php }else {
	header('location:index.php');
	exit;
}
?>