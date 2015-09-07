<!DOCTYPE html>
<html>
   <head>
   <title> Subida y precarga ajax </title>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <!-- Css -->
   <link href="css/bootstrap.css" rel="stylesheet" media="screen">
   <!-- Javascript -->
   <script src="js/jquery-2.0.2.js"></script>
   <script src="js/upload.js"></script>
   <script src="js/bootstrap.min.js"></script>
   <script type="text/javascript">
   function subirArchivos() {
      $("#archivo").upload('subir_archivo.php',

      function(respuesta) {
         //Subida finalizada.
         $("#barra_de_progreso").val(0);
         switch(respuesta){
         	case '0':
         		mostrarRespuesta('El archivo NO se ha podido subir.', false);
         	case '1':
         		mostrarRespuesta('El archivo ha sido subido correctamente.', true);
         	case '2':
         		mostrarRespuesta('El archivo NO se ha podido subir.  Verifique Tamaño (maximo 20kb) y Extencion (jpg-png-gif)', false);
         	case '3':
         		mostrarRespuesta('El archivo NO se ha podido subir. ya existe un archivo con el mismo nombre, debe remonbrar el archivo y vover a intentar', false);
         	case '4':
         		mostrarRespuesta('El archivo NO se ha podido subir. debe seleccionar algun archivo', false);
         	default:
         		mostrarRespuesta('El archivo NO se ha podido subir.', false);

         }
         if(respuesta == 0){
            mostrarRespuesta('El archivo NO se ha podido subir.', false);
         }else if (respuesta == 1) {
            mostrarRespuesta('El archivo ha sido subido correctamente.', true);
            $("#nombre_archivo, #archivo").val('');
         }else  if(respuesta == 3){
            mostrarRespuesta('El archivo ya existe.', false);
         }
         
         mostrarArchivos();
         }, function(progreso, valor) {
            //Barra de progreso.
            console.log(valor);
            $("#barra_de_progreso").val(valor);
         });
   }
   function eliminarArchivos(archivo) {
      $.ajax({
         url: 'eliminar_archivo.php',
         type: 'POST',
         timeout: 10000,
         data: {archivo: archivo},
         error: function() {
            mostrarRespuesta('Error al intentar eliminar el archivo.', false);
         },
         success: function(respuesta) {
            if (respuesta == 1) {
               mostrarRespuesta('El archivo ha sido eliminado.', true);
            } else {
               mostrarRespuesta('Error al intentar eliminar el archivo.', false); 
            }
            mostrarArchivos();
         }
      });
   }
   function mostrarArchivos() {
      $.ajax({
         url: 'mostrar_archivos.php',
         dataType: 'JSON',
         success: function(respuesta) {
            if (respuesta) {
               var html = '';
               for (var i = 0; i < respuesta.length; i++) {
                  if (respuesta[i] != undefined) {
                     html += '<div class="row"> <span class="col-lg-2"> ' + respuesta[i] + ' </span> <div class="col-lg-2"> <a class="eliminar_archivo btn btn-danger" href="javascript:void(0);"> Eliminar </a> </div> </div> <hr />';
                  }
               }
               $("#archivos_subidos").html(html);
            }
         }
      });
   }
   function mostrarRespuesta(mensaje, ok){
      $("#respuesta").removeClass('alert-success').removeClass('alert-danger').html(mensaje);
      if(ok){
         $("#respuesta").addClass('alert-success');
      }else{
         $("#respuesta").addClass('alert-danger');
      }
   }
   $(document).ready(function() {
      mostrarArchivos();
      $("#boton_subir").on('click', function() {
         subirArchivos();
      });
      $("#archivos_subidos").on('click', '.eliminar_archivo', function() {
         var archivo = $(this).parents('.row').eq(0).find('span').text();
         archivo = $.trim(archivo);
         eliminarArchivos(archivo);
      });
   });
   </script>
 </head>
 <body>
    <div class="container">
       <h1> Subida y precarga ajax </h1>
       <div id="respuesta" class="alert"></div>
       <form action="javascript:void(0);">
          <div class="row">
             <div class="col-lg-2"> 
                <label> Nombre el archivo: </label> 
             </div>
             <div class="col-lg-2">
                <input type="text" name="nombre_archivo" id="nombre_archivo" />
             </div>
             <div class="col-lg-2">
                <input type="file" name="archivo" id="archivo" />
             </div> 
          </div>
          <hr />
          <div class="row">
             <div class="col-lg-2">
                <input type="submit" id="boton_subir" value="Subir" class="btn btn-success" />
             </div>
             <div class="col-lg-4">
                <progress id="barra_de_progreso" value="0" max="100"></progress>
             </div>
          </div>
       </form>
       <hr />
       <div id="archivos_subidos"></div>
    </div>
 </body>
</html>