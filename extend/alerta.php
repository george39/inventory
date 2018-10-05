<?php 
include '../conexion/conexion.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">	
	<link rel="stylesheet" href="../cdn/sweetalert2.css">
	<title>Proyecto</title>
</head>
<body>
	<?php
	$mensaje = htmlentities($_GET['mensaje']);
	$carpeta = htmlentities($_GET['carpeta']);
	$pagina = htmlentities($_GET['pagina']);
	$tipo = htmlentities($_GET['tipo']);	

	switch ($carpeta) {
		case 'usuario':
			$carpet = '../usuarios/';
			break;	

		case 'home':
			$carpet = '../inicio/';
			break;

		case 'salir':
			$carpet = '../comienzo/';
			break;			
	}

	switch ($pagina) {
		case 'index':
			$pagin = 'index.php';
			break;

		case 'home':
			$pagin = 'index.php';
			break;
			
		case 'salir':
			$pagin = '';
			break;				
	}

	$direccion = $carpet.$pagin;

	if ($tipo == 'error') {
		$titulo = "Oppss";
	}else {
		$titulo = "Buen trabajo";	
	}

	?>

	

	<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
<script src="../cdn/sweetalert2.js"></script>
 
<script>
	swal({
  title: '<?php echo $titulo ?>',
  text: "<?php echo $mensaje ?>",
  type: '<?php echo $tipo ?>',  
  confirmButtonColor: '#3085d6',  
  confirmButtonText: 'Ok'
}).then(function () {
  location.href='<?php echo $direccion ?>';
});

//para que si se presione enter o escape la alerta nos direccione a la pagina
$(document).click(function(){
	location.href='<?php echo $direccion ?>';
});

$(document).keyup(function(escape) {
	if (escape.which == 27) {
		location.href='<?php echo $direccion ?>';
	}
});
</script>


</body>
</html>