//metodo ajax para validar si el usuario esta disponible o no en la bd 
$('#nombre_usuario').change(function(){
		$.post('ajax_validacion_nombre_usuario.php',{
			nombre_usuario:$('#nombre_usuario').val(),
			beforeSend: function(){
				$('.validacion').html("Espere un momento por favor");
			}
		}, function(respuesta){
			$('.validacion').html(respuesta);
			});		
	});
	

	$('#btn_guardar').hide();//PARA QUE EL BOTON GUARDAR NO APERESCA SI LAS CONTRSEÑAS NO COINCIDEN
	//PARA COMPARAR LAS CONTRASEÑAS
	$('#pass2').change(function(event){
		if ($('#pass1').val() == $('#pass2').val()) {
			swal('Bien hecho...','Las contraseñas coinciden','success');
			$('#btn_guardar').show();//PARA QUE EL BOTON GUARDAR APERESCA SI LAS CONTRSEÑAS NO COINCIDEN

		}else{
			swal('Oppss...','Las contraseñas no coinciden','error');
			$('#btn_guardar').hide();//PARA QUE EL BOTON GUARDAR NO APERESCA SI LAS CONTRSEÑAS NO COINCIDEN
		}		
	});
//PARA DESACTIVAR LA TECLA ENTER PARA QUE NO ENVIE EL FORMULARIO
	$('.form').keypress(function(e){
		if (e.which == 13) {
			return false;
		}
	});