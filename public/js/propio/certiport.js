function agregar_sec(){
  $('#frInfAdd')[0].reset();
  $('#AddInf').modal('show');
  CKEDITOR.instances['html_add'].setData('');
}
function crearInf(){
  conteo=$('#frInfAdd .required').length;
  variable=0;
  for(i=0;i<conteo;i++){
    if($('#frInfAdd .required:eq('+i+')').val()==''){
      $('#frInfAdd .requerido').fadeIn();
      $('#frInfAdd .required:eq('+i+')').css({'border-color' : 'red'})
      variable=variable+1;
    }else{
      $('#frInfAdd .required:eq('+i+')').css({'border-color' : '#D6D6D6'})
    }
  }
  if(variable>0){
    var n = noty({text: 'Los campos remarcados en rojo son obligatorios',type: 'error',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 2500});
    return false;
  }
  token=$('#token').val();
  id=$('#id').val()
  route='/certiport'
  var formData = new FormData($("#frInfAdd")[0]);
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
        $.get('certiport.descripcion',function(data){
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
function editar_certiport(inf_id){
  $.get('certiport/'+inf_id,function(data){
    $('#contend_edit').html(data);
    CKEDITOR.replace('html');
    $('#EditInf').modal('show');
  });
}
function actualizarInf(){
  conteo=$('#frInfe .required').length;
  variable=0;
  for(i=0;i<conteo;i++){
    if($('#frInfe .required:eq('+i+')').val()==''){
      $('#frInfe .requerido').fadeIn();
      $('#frInfe .required:eq('+i+')').css({'border-color' : 'red'})
      variable=variable+1;
    }else{
      $('#frInfe .required:eq('+i+')').css({'border-color' : '#D6D6D6'})
    }
  }
  if(variable>0){
    var n = noty({text: 'Los campos remarcados en rojo son obligatorios',type: 'error',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 2500});
    return false;
  }
  token=$('#token').val();
  id=$('#id').val()
  route='/certiport.update/';
  var formData = new FormData($("#frInfe")[0]);
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
        $.get('certiport.descripcion',function(data){
          $('.descripcion_inf').html(data);
          $('#EditInf').modal('hide');
          $('.capa').hide();
          $('[data-toggle="tooltip"]').tooltip();
          var n = noty({text: 'Informacion actualizada correctamente.',type: 'success',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 4000});
        });
      }else{
        var n = noty({text: 'Hubo un error al actualizar la informacion.',type: 'error',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 4000});
        $('.capa').hide();
      }

    },
    error: function(data){
      $('.capa').hide();
      var n = noty({text: 'Hubo un error al intentar actualizar la informacion.',type: 'error',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 4000});

    },
  });
}
function eliminar_certiport(infs){
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
        route='certiport.eliminar'
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
              $.get('certiport.descripcion',function(data){
                $('.descripcion_inf').html(data);
                $('#EditInf').modal('hide');
                $('.capa').hide();
                $('[data-toggle="tooltip"]').tooltip();
                var n = noty({text: 'Acabas de Eliminar la seccion.',type: 'warning',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 4000});
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
