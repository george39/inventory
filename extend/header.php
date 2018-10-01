<?php 
include '../conexion/conexion.php';
?>

<!DOCTYPE html>
<html lang="es">
<head> 
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie-edge">
	<link rel="stylesheet" href="../css/materialize.min.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="../cdn/sweetalert2.css">

	<!-- PARA GENERAR ESPACIO Y MOSTRAR EL TITULO TITULO -->
	<style media="screen">
		header, main, footer {
      padding-left: 300px;
    }
    /*para que el boton menu desaparesca cunado esta en pantalla pequeña*/
    .button-collpase{
    	display: none;
    }

    @media only screen and (max-width : 992px) {
      header, main, footer {
        padding-left: 0;
      }
      /*para que el boton menu aparesca cuando la pantalla esta grande */
      .button-collpase{
      	display: inherit;
      }
    }
	</style>
	<title>Proyecto</title>
</head>
<body>
<main>

	<?php include 'menu_admin.php' ?>