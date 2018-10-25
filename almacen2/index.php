<?php include '../extend/header.php'; 
?>

<div class="row">
	<div class="col s12">
		<div class="card">
			<div class="card-content">
				<span class="card-title">Agregar elementos</span>

        <!--Aqui almacenamos el total de los items que se agregan a la tabla -->
        <div align="right">
          <h4>Total</h4>
            <td><span id="total"></span></td>
        </div>

        <!--Boton para guardar todos los items que estan en la tabla -->
        <div align="center">
          <button type="button" name="guardar" id="guardar" class="btn btn-info" onclick="javascript:location.reload()"> Guardar<i  class="material-icons"i>send</i></button>
        </div>


      				<table  class="table bordered highlight responsive-table" id="data_table">
              <thead>                  
                <tr>
                
                  <th>Código</th>
                  <th>No tarea</th>
                  <th>Referencia</th>
                  <th>Talla</th>
                  
                  <th>Operario</th>
                    
                  <th><select class="" name="id_empleado" id="id_empleado" required>
                      <option value="" disabled selected>ELIGE UN OPERARIO</option>
                      
                        <?php $sel=$conexion->prepare("SELECT * FROM empleados ");
                        $sel->execute();
                        $res = $sel->get_result();

                        while ($f = $res->fetch_assoc()) {?>
                          <option value="<?php echo $f['id_empleado'] ?>"><?php echo $f['nombre_empleado'] 
                          ?> </option>
                          
                        <?php } 
                        $sel->close();
                        ?>
                      </select>

                  </th>



                                                    
                </tr>

                </thead>

                <tbody>
                  <tr>
                   
                  </tr>

                </tbody>

                
                <!--caja para leer el codigo de barras -->                
                <input type="text" name="leer" id="leer" placeholder="Ingrese aqui el codigo" autofocus>

                
                <!--aqui almaceno los resultados de la consulta de ajax -->
                <section id="tabla_resultado"></section>


          </table>
  <br>
  

		</div>

	</div>
</div>


<?php include '../extend/scripts.php'; ?>
<script src="../js/validacion.js"></script>





