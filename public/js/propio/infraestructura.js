function editar_infraestructura(inf_id){
  $.get('infraestructura/'+inf_id,function(data){
    $('#contend_edit').html(data);
    CKEDITOR.replace('html');
    $('#EditInf').modal('show');
  });
}
function actualizarInf(){
  conteo=$('#frInf .required').length;
  variable=0;
  for(i=0;i<conteo;i++){
    if($('#frInf .required:eq('+i+')').val()==''){
      $('#frInf .requerido').fadeIn();
      $('#frInf .required:eq('+i+')').css({'border-color' : 'red'})
      variable=variable+1;
    }else{
      $('#frInf .required:eq('+i+')').css({'border-color' : '#D6D6D6'})
    }
  }
  if(variable>0){
    var n = noty({text: 'Los campos remarcados en rojo son obligatorios',type: 'error',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 2500});
    return false;
  }
  token=$('#token').val();
  id=$('#id').val()
  route='/infraestructura/'+id;
  datos=$('#frInf').serialize();
  $('.capa').show();
  $.ajax({
    url: route,
    headers: {'X-CSRF-TOKEN': token},
    type: 'PUT',
    dataType: 'json',
    data: datos,
    beforeSend: function(){
    },
    success: function(data){
      if(data.mensaje=='1'){
        $.get('infraestructura.descripcion',function(data){
          $('.descripcion_inf').html(data);
          $('#EditInf').modal('hide');
          $('.capa').hide();
          $('[data-toggle="tooltip"]').tooltip();
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
function agregar_imagen_inf(inf_id){
  $('#id_img').val(inf_id);
  $('#ImgInf').modal('show');
}
function subirImagen(){
  conteo=$('#imfrInf .required').length;
  variable=0;
  for(i=0;i<conteo;i++){
    if($('#imfrInf .required:eq('+i+')').val()==''){
      $('#imfrInf .requerido').fadeIn();
      $('#imfrInf .required:eq('+i+')').css({'border-color' : 'red'})
      variable=variable+1;
    }else{
      $('#imfrInf .required:eq('+i+')').css({'border-color' : '#D6D6D6'})
    }
  }
  if(variable>0){
    var n = noty({text: 'Los campos remarcados en rojo son obligatorios',type: 'error',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 2500});
    return false;
  }
  token=$('#token').val();
  id=$('#id').val()
  route='/subirImgInf';
  var formData = new FormData($("#imfrInf")[0]);
  $('.capa').show();
  $.ajax({
    url: route,
    headers: {'X-CSRF-TOKEN': token},
    type: 'POST',
    dataType: 'json',
    data: formData,
    cache: false,
    contentType: false,
    processData: false,
    beforeSend: function(){
    },
    success: function(data){
      if(data.mensaje=='1'){
        $.get('infraestructura.descripcion',function(data){
          $('.descripcion_inf').html(data);
          $('#ImgInf').modal('hide');
          $('.capa').hide();
          $('[data-toggle="tooltip"]').tooltip();
        });
      }else{
        $('.capa').hide();
        var n = noty({text: 'Hubo un error al subir la imagen.',type: 'error',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 4000});
      }
    },
    error: function(data){
      $('.capa').hide();
      var n = noty({text: 'Hubo un error al intentar actualizar la informacion.',type: 'error',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 4000});
      $noty.close();
    },
  });
}
function quitar_imagen_inf(imagen,infs){
  var n = noty({
    text: '¿Deseas eliminar esta imagen?',
    type: 'notification',
    dismissQueue: true,
    layout: 'topRight',
    theme: 'defaultTheme',
    buttons: [
      {addClass: 'btn btn-primary', text: 'Si', onClick: function($noty) {
        token=$('#token').val();
        id=$('#id').val()
        route='infraestructura.quitarImagen'
        datos='imagen_id='+imagen+'&infs='+infs;
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
              $.get('infraestructura.descripcion',function(data){
                $('.descripcion_inf').html(data);
                $('#ImgInf').modal('hide');
                $('.capa').hide();
                $('[data-toggle="tooltip"]').tooltip();
              });
            }else{
              $('.capa').hide();
              var n = noty({text: 'Hubo un error al subir la imagen.',type: 'error',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 4000});
            }
          },
          error: function(data){
            $('.capa').hide();
            var n = noty({text: 'Hubo un error al intentar actualizar la informacion.',type: 'error',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 4000});
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
function eliminar_infraestructura(infs){
  var n = noty({
    text: '¿Deseas eliminar esta seccion?',
    type: 'notification',
    dismissQueue: true,
    layout: 'topRight',
    theme: 'defaultTheme',
    buttons: [
      {addClass: 'btn btn-primary', text: 'Si', onClick: function($noty) {
        token=$('#token').val();
        id=$('#id').val()
        route='infraestructura.eliminar'
        datos='infs='+infs;
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
              $.get('infraestructura.descripcion',function(data){
                $('.descripcion_inf').html(data);
                $('#ImgInf').modal('hide');
                $('.capa').hide();
                $('[data-toggle="tooltip"]').tooltip();
              });
            }else{
              $('.capa').hide();
              var n = noty({text: 'Hubo un error al subir la imagen.',type: 'error',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 4000});
            }
          },
          error: function(data){
            $('.capa').hide();
            var n = noty({text: 'Hubo un error al intentar actualizar la informacion.',type: 'error',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 4000});
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
function agregar_sec(){
  $('#frInfAdd')[0].reset();
  $('#AddInf').modal('show');
  CKEDITOR.instances['html_add'].setData('');
}
function crearInf(){
  token=$('#token').val();
  id=$('#id').val()
  route='/infraestructura'
  datos=$('#frInfAdd').serialize();
  $('.capa').show();
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
        $.get('infraestructura.descripcion',function(data){
          $('.descripcion_inf').html(data);
          $('#AddInf').modal('hide');
          $('.capa').hide();
          $('[data-toggle="tooltip"]').tooltip();
          var n = noty({text: 'Se creo correctamente la sección.',type: 'success',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 4000});
        });
      }else{
        $('.capa').hide();
        var n = noty({text: 'Hubo un error al subir la imagen.',type: 'error',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 4000});
      }
    },
    error: function(data){
      $('.capa').hide();
      var n = noty({text: 'Hubo un error al intentar actualizar la informacion.',type: 'error',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 4000});
      $noty.close();
    },
  });
}
