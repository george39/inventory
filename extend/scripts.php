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
</script>
 