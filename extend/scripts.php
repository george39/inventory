

</main>
<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
 <script src="../js/materialize.min.js"></script> 
 <script src="../cdn/sweetalert2.js"></script>
<!-- para que funcione el boton de menu -->


<script>
	//barra de busqueda
	$('#buscar').keyup(function(event){
		var contenido = new RegExp($(this).val(), 'i'); //para hacer la barra sensible a mayusculas y minusculas
		$('tr').hide();
		$('tr').filter(function(){
			return contenido.test($(this).text());
		}).show();
		$('.cabecera').attr('style',''); //para que no me borre las cabeceras
	});

	$('.button-collpase').sideNav();

	//para que aparesca el select para seleccionar el administrador
	$('select').material_select();

	/*para convertir todo a mayusculas */
	function may(obj, id){
		obj = obj.toUpperCase();
		document.getElementById(id).value = obj;
	}

	//calendario
	$('.datepicker').pickadate({
		selectMonhts: true,
		selectYears: 15,
		
	});


//*****************************************************************************	
		//busqueda ajax
$(obtener_registros());

		function obtener_registros(codigo)
		{
		
		$.ajax({			
			url:'insertar_item.php',
			type:'POST',
			dataType : 'html',
			data : {codigo: codigo},
			
		})
		.done(function(resultado){
			$("#tabla_resultado").html(resultado);
		})	
		
	}//cierro funcion obtener_registros
	$(document).on('keyup', '#leer', function(){
		var valorBusqueda=$(this).val();
		if (valorBusqueda!="") {
			obtener_registros(valorBusqueda);
		}else {
			obtener_registros();
		}
	}); // cierro funcion para buscar


//******************************************************************************
//******************************************************************************
//FUNCION PARA LEER CODIGO DE BARRAS Y AGREGARLO A LA LISTA
$(document).ready(function(){
	var count = 0;

	//$('#add').click(function(){
	$('#leer').keypress(function(e){	
		if (e.which == 13) {
		count = count + 1;		

		//traigo los datos de la consulta y los guardo en variables
		var id_troquelado = $('#codigo_barras').val();
		var id_tarea = $('#id_tarea').val();
		var referencia = $('#referencia').val();
		var talla = $('#talla').val();
		//var fecha = $('#fecha_registro').val();		
		var id_empleado = $('#id_empleado').val();
		

		var html_code = "<tr id='row"+count+"'>";
		//html_code += '<td>'+count+'</td>';
		html_code += "<td contenteditable='true' class='id_troquelado'>"+id_troquelado+"</td>";
		html_code += "<td contenteditable='true' class='id_tarea'>"+id_tarea+"</td>";
		html_code += "<td contenteditable='true' class='referencia'>"+referencia+"</td>";
		html_code += "<td contenteditable='true' class='talla'>"+talla+"</td>";
		//html_code += "<td contenteditable='true' class='fecha_registro'>"+fecha+"</td>";		
		html_code += "<td contenteditable='true' class='id_empleado'>"+id_empleado+"</td>";
		document.getElementById('total').innerHTML = count;	
			
		html_code += "<td><button type='button'  name='remove'  data-row='row"+count+"'  class='btn-floating red  remove'><i class='material-icons'>delete_forever</i>'</button></td>";	
		
		html_code += "</tr>";
		$('#data_table').append(html_code);		
		$('input[type="text"]').val('');
		
		}//cierro if
	});



	//PARA ELIMINAR FILAS
	$(document).on('click', '.remove', function(){
		var delete_row = $(this).data("row");
		$('#' + delete_row).remove();
		//para que el total se descuente cuando se elimina una fila
		count = count -1;
		document.getElementById('total').innerHTML=count;

	});

	// para guardar los datos en la base de datos
	$('#guardar').click(function(){
		var id_troquelado = [];//$('#codigo_barras').val();
		var id_tarea = [];//$('#id_tarea').val();
		var referencia = [];//$('#referencia').val();
		var talla = [];//$('#talla').val();
		//var fecha = [];//$('#fecha').val();	
		var id_empleado = [];

	
		$('.id_troquelado').each(function(){
			id_troquelado.push($(this).text());
		});
		$('.id_tarea').each(function(){
			id_tarea.push($(this).text());
		});
		$('.referencia').each(function(){
			referencia.push($(this).text());
		});
		$('.talla').each(function(){
			talla.push($(this).text());
		});
		//$('.fecha_registro').each(function(){
			//fecha.push($(this).text());
		//});
		
		$('.id_empleado').each(function(){
			id_empleado.push($(this).text());
		});
		
		$.ajax({
			url:"guardar_tarea.php",
			method:"POST",
			data:{id_troquelado:id_troquelado, id_tarea:id_tarea, referencia:referencia, talla:talla, id_empleado:id_empleado},
			success:function(data){
				alert(data);
				$("td[contentEditable='true']").text("");
				for(var i=2; i<=count; i++)
				{
					$('tr#'+i+'').remove();
				}
				//fetch_item_data();
			}
		});
	});
});


</script>
 