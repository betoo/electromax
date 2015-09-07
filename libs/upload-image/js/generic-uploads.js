   function subirArchivos() {
      $("#archivo").upload('../libs/upload-image/subir_archivo.php',

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
            $("#barra_de_progreso").val(valor);
         });
   }
   function eliminarArchivos(archivo) {
      $.ajax({
         url: '../libs/upload-image/eliminar_archivo.php',
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
         url: '../libs/upload-image/mostrar_archivos.php',
         dataType: 'JSON',
         success: function(respuesta) {
            if (respuesta) {
               var html = '';
               for (var i = 0; i < respuesta.length; i++) {
                  if (respuesta[i] != undefined) {
                     var nombre= respuesta[i].split(".");
                     html += '<div class="row"> '+
                                 '<span class="col-lg-1"> '+
                                    '<img width="100" height="100" src="../img/uploads/'+ respuesta[i] + '">'+
                                 '</span>' +
                                 '<div class="col-lg-1"> '+
                                    '<a class="eliminar_archivo btn btn-danger" href="javascript:void(0);"> Eliminar </a> '+
                                '</div> '+
                                '<div class="col-lg-1">'+
                                    '<input type="checkbox" name="'+nombre[0]+'" value="'+nombre[0]+'">activo<br>'+
                                '</div>'+
                              ' <hr /></div>';
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
      $("#respuesta").css('display','block');
      $("#respuesta").delay(3000).slideUp(300);
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