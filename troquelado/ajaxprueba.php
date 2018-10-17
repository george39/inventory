<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet prefetch" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
  <title>Document</title>
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-md-12" style="margin-top:20px;">
          <table class="table table-bordered table-striped">
            <tr>
               <td>País</td>
               <td>Acciones</td>
            </tr>
            <tr>
              <td >US</td>
              <td id="us">
                <button type="button" class="add">Ver ciudad</button>                    </td>
            </tr>
            <tr>
              <td>MX</td>
              <td id="mx">
                <button type="button" class="add">Ver ciudad</button>                    </td>
            </tr>           
          </table>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <table class="table table-bordered table-striped" id="details-country">
          <tr>
             <td>ID ciudad</td>
             <td>Ciudad</td>
             <td>País</td>
             <td>Acción</td>
          </tr>
        </table>
      </div>
    </div>
  </div>
  

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
</body>
</html>


<script>
	$(document).ready(function(){
  $('.add').click(function(){
    
    /*
    ** Obtengo el ID del pais del elemento padre
    ** del boton al que le doy clic
    */
    let id_country = $(this).parent().attr('id');
    /*
    ** Creo una variable con la URL a la que
    ** mandaré la petición y le concateno la variable id_country
    */
    let url = `https://api.meetup.com/2/cities?&country=${id_country}&page=1`;
    /*
    ** Creo una funcion AJAX de tipo GET donde
    ** configuro sus valores.
    ** type = tipo de método. Ej: POST o GET
    ** url = url donde haré la petición
    ** success = Si la información es correcta, me la retorna de la url donde hice la petición
    ** dataType = El tipo de dato que esperamos del servidor.
    ** jsonp por que hacemos una petición a un dominio diferente
    */
    
    $.ajax({
      type: "GET",
      url: "insertar_item.php",
      success: function(data)
      {
        //console.log(data);
        let ciudad = data['results'][0]['city'];
        let id_ciudad = data['results'][0]['id'];
        let pais = data['results'][0]['localized_country_name'];
        
        let html = `
          <tr>
            <td>${id_ciudad}</td>
            <td>${ciudad}</td>
            <td>${pais}</td>
            <td><button type="button" class="deleteCity">Eliminar</button></td>
          </tr>
        `;
        
        $('#details-country tbody').append(html); //Insertamos la fila al cuerpo de la segunda tabla.
      },
      dataType: 'jsonp',
    });
    
  });
  
  //Delegación de eventos.
  $('#details-country tbody' ).on( "click", ".deleteCity", function() {
    $(this).parent().parent().remove();
  });
  
  
});
</script>