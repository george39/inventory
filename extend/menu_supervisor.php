

<nav class="blue">
	<a href="" data-activates="menu" class="button-collpase"><i class="material-icons">menu</i></a>
	<thead>
		<style type="text/css">
			
			ul li a 
			
			ul li.active a
			{
				background: #262626;
				color: #fff;
			}
		</style>
	</thead>
</nav>
<ul   class="side-nav fixed" id="menu">
	
	<li class="active"><a href="../inicio"><i class="material-icons blue-text">home</i>INICIO</a></li>
	<li><div class="divider"></div></li>
	<li><a href="../tarea"><i class="material-icons blue-text">note_add</i>TAREA</a></li>
	<li><div class="divider"></div></li>
	<li><a href="../troquelado"><i class="material-icons blue-text">archive</i>TROQUELADO</a></li>
	<li><div class="divider"></div></li>
	<li><a href="#" class="current"><i class="material-icons blue-text">airline_seat_recline_normal</i> GUARNECIDA</a></li>
	<li><div></div></li>
	<li><div class="divider"></div></li>
	<li><a href="../almacen2">ALMACEN 2</a></li>
	<li><div class="divider"></div></li>	
	<li><a href="../login/salir.php"><i class="material-icons red-text">power_settings_new</i>SALIR</a></li>
	<li><div class="divider"></div></li>
	
</ul>
<title>Ejercicio - Listas de enlaces</title>

<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
    <script>
      $(document).on('click', 'ul li', function(){
      	$(this).addClass('active').siblings().removeClass('active')
      })
    
  
   </script>
