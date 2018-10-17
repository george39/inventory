<?php include '../extend/header.php'; 
?>

<div class="row">
	<div class="col s12">
		<div class="card">
			<div class="card-content">
				<span class="card-title">Agregar elementos</span>
      				<table  class="table table-border highlight responsive-table" id="data_table">
              <thead>                  
                <tr>
                
                  <th>Id troquelado</th>
                    <th>Id tarea</th>
                    <th>Referencia</th>
                    <th>Talla</th>
                    <th>Fecha</th>
                    <th>Id tarea unidad</th>
                    <th><select class="" name="id_empleado" id="id_empleado" required>
              <option value="" disabled selected>ELIGE EL CARGO DEL EMPLEADO</option>
              <?php $sel=$conexion->prepare("SELECT * FROM empleados ");
              $sel->execute();
              $res = $sel->get_result();
              while ($f = $res->fetch_assoc()) {?>
                <option value="<?php echo $f['id_empleado'] ?>"><?php echo $f['nombre_empleado'] ?></option>
              <?php } 
              $sel->close();
              ?>
            </select></th>
                                                    
                </tr>
                </thead>

                <tbody>
                  <tr>
                   
                  </tr>
                </tbody>

                



                                
                  <input type="text" name="leer" id="leer" placeholder="Ingrese aqui el codigo" autofocus>
                
                <section id="tabla_resultado">
                  
                </section>


                <div id="insertar_item"></div>

                  
                  
                     
          </table>    

	<div align="center">
      	<button type="button" name="guardar" id="guardar" class="btn btn-info"> Guardar<i  class="material-icons"i>send</i></button>
       

	</div>

 
  

  <div class="resultado"></div>

  <br>
  

		</div>

	</div>
</div>


<?php include '../extend/scripts.php'; ?>





