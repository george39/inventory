
<?php include '../conexion/conexion.php';	
	include '../troquelado/index.php';		
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$buscar = htmlentities($_POST['buscar1']);
	


	$sel_id = $conexion->prepare("SELECT * FROM tarea_unidad WHERE codigo_barras = ?");
	$sel_id->bind_param('s', $buscar);
	$sel_id->execute();
	$res_id = $sel_id->get_result();
	$row = mysqli_num_rows($res_id);
	$entrada = 1;
?>
<?php while ($f = $res_id->fetch_assoc()) { ?>
<?php $id = $f['codigo_barras']; ?>
<div class="container" >
<div class="row" >
  <div class="col s12">
    <div class="card">
      <div class="card-content">   
     
        <table >
        <thead>
        <tr class="cabecera">
          <th>Id toquelado</th>
          <th>Id tarea</th>
          <th>Referencia</th>
          <th>Talla</th>
          <th>Fecha</th>
          <th>Id tarea unidad</th>
          <th>Operario</th>
          </tr>
        </thead> 
        	
          	<tr class="cabecera">
                    
          	<td><input id="idarticulo" value="<?php echo $f['id_tarea_unidad'] ?>"></input></td> <!-- -->
           
            <td><input type="number" class="monto"  id="valor1"  value="<?php echo $f['id_tarea'] ?>"></td> <!-- -->
            <td><input type="number" id="valor2" class="monto"  value="<?php echo $f['referencia'] ?>"></td><!--<?php #echo $f['valorpublico'] ?> -->
            <td><input type="number" id="valor2" class="monto"  value="<?php echo $f['talla'] ?>"></td>
            <td><input type="text" id="valor2" class="monto"  value="<?php echo $f['fecha'] ?>"></td>
            <td><input type="number" id="valor2" class="monto"  value="<?php echo $f['id_operario'] ?>"></td>
              
          </tr>
         
         
          <?php }
         
          $conexion->close();
          ?>
        </table>
        </form>     
      </div>
    </div> 
  </div>
</div>

  </script>
  <?php include '../extend/scripts.php'; ?>
<?php }else {
	header('location:index.php');
	exit;
}
?>