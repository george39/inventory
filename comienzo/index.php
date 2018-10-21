<!--para que la sesion no se cierre si no se cierra el navegador -->
<?php @session_start();
if (isset($_SESSION['nombre_usuario'])) {
  header('location:../inicio');
}
?>

<!DOCTYPE html>
<html lang="es">
<head> 
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie-edge">
	<link rel="stylesheet" href="../css/materialize.min.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<title>Proyecto</title>
</head>
<body class="grey lighten-2">
  <main>
    <div class="container">
      <div class="row">
        <div class="col s12">
          <div class="card z-depth-5">
            <div class="card-content">
              <span class="card-title"><center>Inicio de sesión</center></span>
              <form action="../login/index.php" method="post" autocomplete="off">
                <div class="input-field">
                  <i class="material-icons prefix">perm_identity</i>
                  <input type="text" name="usuario" id="usuario"]" autofocus>
                  <label for="usuario">Usuario</label>
                </div>
                <div class="input-field">
                  <i class="material-icons prefix">vpn_key</i>
                  <input type="password" name="contra" id="contra" >
                  <label for="contra">Contraseña</label> <!--pattern="[A-Za-a0-9{4,15}]" -->
                </div>
                <div class="input-field center">
                  <button type="submit" class="btn waves-effect waves-light">Acceder</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

  <script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
 <script src="../js/materialize.min.js"></script> 

</body>
</html>