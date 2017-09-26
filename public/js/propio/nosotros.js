function update_galeria(){
  $('#imagenesNosotros').modal('show');
}
function subir_imagen(){
  conteo=$('#frm_img_ns .required').length;
  variable=0;
  for(i=0;i<conteo;i++){
    if($('#frm_img_ns .required:eq('+i+')').val()==''){
      $('#frm_img_ns .requerido').fadeIn();
      $('#frm_img_ns .required:eq('+i+')').css({'border-color' : 'red'})
      variable=variable+1;
    }else{
      $('#frm_img_ns .required:eq('+i+')').css({'border-color' : '#D6D6D6'})
    }
  }
  if(variable>0){
    var n = noty({text: 'Los campos remarcados en rojo son obligatorios',type: 'error',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 2500});
    return false;
  }
  var miurl="/subirImgNos";
  var miurl2="/llamarImgNos/";
  var divresul="#galeria_imagenes";
  var formData = new FormData($("#frm_img_ns")[0]);
  $('.capa').show();
  $.ajax({
    url: miurl,
    type: 'POST',
    data: formData,
    dataType: 'json',
    cache: false,
    contentType: false,
    processData: false,
    beforeSend: function(){
    },
    success: function(data){
      if(data.mensaje=='1'){
        $('.capa').hide();
        var n = noty({text: 'La imagen se cargo satisfactoriamente',type: 'success',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 4000});
        $.get(miurl2,function(data){
          $(divresul).html(data);
          $("#frm_img_ns")[0].reset();
        });
      }else{
        $('.capa').hide();
        var n = noty({text: 'Hubo un error al intentar cargar la imagen.',type: 'error',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 4000});
      }
    },
    error: function(data){
      $('.capa').hide();
      var n = noty({text: 'Hubo un error al intentar cargar la imagen recurda: Solo se permite imagenes en forma JPG,JPEG,BMP,PNG tamaño maximo 1024kb, Resolucion Minima:500x500px | Resolucion Maxima: 1000x1000px',type: 'error',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 4000});
    },
  });
}
function quitar_imagen_nos(imagen_id){
  var n = noty({
    text: '¿Deseas eliminar esta imagen?',
    type: 'notification',
    dismissQueue: true,
    layout: 'topRight',
    theme: 'defaultTheme',
    buttons: [
      {addClass: 'btn btn-primary', text: 'Si', onClick: function($noty) {
        var miurl2="/llamarImgNos/";
        var divresul="#galeria_imagenes";
        var miurl="/quitarImagenNos/"+imagen_id;
        $.ajax({
          url: miurl,
          type: 'GET',
          dataType: 'json',
          beforeSend: function(){
          },
          success: function(data){
            if(data.mensaje=='1'){
              $('.capa').hide();
              $.get(miurl2,function(data){
                $(divresul).html(data);
              });
            }else{
              $('.capa').hide();
              var n = noty({text: 'Hubo un error al intentar cargar la imagen.',type: 'error',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 4000});
            }
            $noty.close();
          },
          error: function(data){
            $('.capa').hide();
            var n = noty({text: 'Hubo un error al intentar cargar la imagen recurda: Solo se permite imagenes en forma JPG,JPEG,BMP,PNG tamaño maximo 1024kb, Resolucion Minima:500x500px | Resolucion Maxima: 1000x1000px',type: 'error',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 4000});
            $noty.close();
          },

        });
        }
      },
      {addClass: 'btn btn-danger', text: 'Cancelar', onClick: function($noty) {
          $noty.close();
          noty({dismissQueue: true, force: true, layout:  'bottom', theme: 'default', text: 'Cancelaste la eliminacion del registro', type: 'information',timeout: 2500});
        }
      }
    ]
  });
}
function editar_seccion(seccion){
  $(seccion).modal('show');
}
function actualizarSec(formulario){
  token=$('#token').val();
  route='/actualizarNos';
  datos=$('#'+formulario).serialize();
  $.ajax({
    url: route,
    headers: {'X-CSRF-TOKEN': token},
    type: 'POST',
    dataType: 'json',
    data: datos,
    beforeSend: function(){
    },
    success: function(data){
      if(data.mensaje=='1'){
        $.get('/descripcion',function(data){
          $('#').html(data);
          $("#frm_img_ns")[0].reset();
        });
      }else{
        var n = noty({text: 'Hubo un error al actualizar la informacion.',type: 'error',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 4000});
      }

    },
    error: function(data){
      $('.capa').hide();
      var n = noty({text: 'Hubo un error al intentar actualizar la informacion.',type: 'error',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 4000});
      $noty.close();
    },
  });
}
