function mostrarData(){
  $('#dataProfile').fadeIn()
}
function ocultarData(){
  $('#dataProfile').fadeOut()
}
function guardarDataUser(){
  conteo=$('#formProfile .required').length;
  variable=0;
  for(i=0;i<conteo;i++){
    if($('#formProfile .required:eq('+i+')').val()==''){
      $('#formProfile .requerido').fadeIn();
      $('#formProfile .required:eq('+i+')').css({'border-color' : 'red'})
      variable=variable+1;
    }else{
      $('#formProfile .required:eq('+i+')').css({'border-color' : '#D6D6D6'})
    }
  }
  if(variable>0){
    var n = noty({text: 'Los campos remarcados en rojo son obligatorios',type: 'error',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 2500});
    return false;
  }
  var formData = new FormData($("#formProfile")[0]);
  $('.capa').show();
  $.ajax({
    url: '/guardarDataUser',
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
        var n = noty({text: 'Los datos se actualizaron correctamente.',type: 'success',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 4000});
        $.get('/descAdmin',function(data){
          $('#descAdmin').html(data);
          $('.capa').hide();
        });
      }else{
        $('.capa').hide();
        var n = noty({text: 'Hubo un error al actualizar los datos.',type: 'error',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 4000});
      }
    },
    error: function(data){
      $('.capa').hide();
      var n = noty({text: 'Hubo un error al intentar cargar la imagen recurda: Solo se permite imagenes en forma JPG,JPEG,BMP,PNG tamaño maximo 1024kb, Resolucion Minima:500x500px | Resolucion Maxima: 1000x1000px',type: 'error',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 4000});
    },
  });
}
function crearUser(){
  conteo=$('#formAdd .required').length;
  variable=0;
  for(i=0;i<conteo;i++){
    if($('#formAdd .required:eq('+i+')').val()==''){
      $('#formAdd .requerido').fadeIn();
      $('#formAdd .required:eq('+i+')').css({'border-color' : 'red'})
      variable=variable+1;
    }else{
      $('#formAdd .required:eq('+i+')').css({'border-color' : '#D6D6D6'})
    }
  }
  if(variable>0){
    var n = noty({text: 'Los campos remarcados en rojo son obligatorios',type: 'error',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 2500});
    return false;
  }
  var formData = new FormData($("#formAdd")[0]);
  $('.capa').show();
  $.ajax({
    url: 'perfil',
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
        var n = noty({text: 'Los datos se actualizaron correctamente.',type: 'success',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 4000});
        $.get('/formViewAdd',function(data){
          $('#formViewAdd').html(data);
          $('.capa').hide();
          $('#tbUsers').DataTable();
        });
      }else{
        $('.capa').hide();
        var n = noty({text: 'Hubo un error al actualizar los datos.',type: 'error',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 4000});
      }
    },
    error: function(data){
      $('.capa').hide();
      var n = noty({text: 'Hubo un error al intentar cargar la imagen recurda: Solo se permite imagenes en forma JPG,JPEG,BMP,PNG tamaño maximo 1024kb, Resolucion Minima:500x500px | Resolucion Maxima: 1000x1000px',type: 'error',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 4000});
    },
  });
}
function buscar_permisos(este){
  user_id=este.value;
  $.get('/listPermisos/'+user_id,function(data){
    $('#listPermisos').html(data);
    $('.capa').hide();
  });
}
function conceder_permiso(check){
  var id=$(check).prop( "id");
  var user_id=$('#user_id_list').val();
  var estado=$(check).prop( "checked");
  var token =$('#token').val();
  var route='permiso.conceder';
  $.ajax({
    url: route,
    headers: {'X-CSRF-TOKEN': token},
    type: 'POST',
    dataType: 'json',
    data: 'id='+id+'&estado='+estado+'&user_id='+user_id,
    success: function(msj){
      if(msj==1){
        $('.preload_layout').hide();
        var n = noty({text: 'Se concedio el permiso',type: 'success',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 2500});
      }else if(msj==0){
        $(check).prop( "checked", false );
         var n = noty({text: 'Hubo un error al momento de dar permisos',type: 'error',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 2500});
         $('.preload_layout').hide();
      }else if(msj==2){
        $('.preload_layout').hide();
        var n = noty({text: 'Acabas de retirar este permiso',type: 'infromation',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 2500});
      }
    },
    error:function(msj){
        var n = noty({text: 'Hubo un error al momento de dar permisos',type: 'error',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 2500});
      $('.modal-save').hide();
    }
  });
}
function editar_user(){
  user_id=$('#codigo').val();
  if(user_id==''){
    var n = noty({text: 'Debes elegir un usuario para editar su informacion.',type: 'warning',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 2500});
    return false;
  }
  $.get('/formViewEdit/'+user_id,function(data){
    $('#contentEdit').html(data);
    $('#editarUsuario').modal('show');
  });
}
function updateUser(){
  conteo=$('#formEdit .required').length;
  variable=0;
  for(i=0;i<conteo;i++){
    if($('#formEdit .required:eq('+i+')').val()==''){
      $('#formEdit .requerido').fadeIn();
      $('#formEdit .required:eq('+i+')').css({'border-color' : 'red'})
      variable=variable+1;
    }else{
      $('#formEdit .required:eq('+i+')').css({'border-color' : '#D6D6D6'})
    }
  }
  if(variable>0){
    var n = noty({text: 'Los campos remarcados en rojo son obligatorios',type: 'error',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 2500});
    return false;
  }
  var formData = new FormData($("#formEdit")[0]);
  $('.capa').show();
  $.ajax({
    url: '/guardarDataUser',
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
        var n = noty({text: 'Los datos se actualizaron correctamente.',type: 'success',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 4000});
        $.get('/formViewAdd',function(data){
          $('#formViewAdd').html(data);
          $('.capa').hide();
          cargar_dataTable();
          $('#editarUsuario').modal('hide');
        });
      }else{
        $('.capa').hide();
        var n = noty({text: 'Hubo un error al actualizar los datos.',type: 'error',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 4000});
      }
    },
    error: function(data){
      $('.capa').hide();
      var n = noty({text: 'Hubo un error al intentar cargar la imagen recurda: Solo se permite imagenes en forma JPG,JPEG,BMP,PNG tamaño maximo 1024kb, Resolucion Minima:500x500px | Resolucion Maxima: 1000x1000px',type: 'error',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 4000});
    },
  });
}
function activar_user(estado){
  user_id=$('#codigo').val();
  if(user_id==''){
    var n = noty({text: 'Debes elegir un usuario para modificar su estado.',type: 'warning',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 2500});
    return false;
  }
  user_id=$('#codigo').val();
  formData="user_id="+user_id+'&estado='+estado;
  var token =$('#token').val();
  $.ajax({
    url: '/activarUser',
    type: 'POST',
    data: formData,
    dataType: 'json',
    headers: {'X-CSRF-TOKEN': token},
    beforeSend: function(){
    },
    success: function(data){
      if(data.mensaje=='1'){
        $('.capa').hide();
        var n = noty({text: 'Los datos se actualizaron correctamente.',type: 'success',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 4000});
        $.get('/formViewAdd',function(data){
          $('#formViewAdd').html(data);
          cargar_dataTable();
        });
      }else{
        $('.capa').hide();
        var n = noty({text: 'Hubo un error al actualizar los datos.',type: 'error',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 4000});
      }
    },
    error: function(data){
      $('.capa').hide();
      var n = noty({text: 'Hubo un error al intentar cargar la imagen recurda: Solo se permite imagenes en forma JPG,JPEG,BMP,PNG tamaño maximo 1024kb, Resolucion Minima:500x500px | Resolucion Maxima: 1000x1000px',type: 'error',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 4000});
    },
  });
}
function responder_consulta(campo,comentario_id){
  respuesta=$(campo).val();
  if(respuesta==''){
    var n = noty({text: 'Primero llena la respuesta para asi poder enviarla.',type: 'warning',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 2500});
    return false;
  }
  formData="comentario_id="+comentario_id+"&respuesta="+respuesta;
  var token =$('#token').val();
  $.ajax({
    url: '/responderComentario',
    type: 'POST',
    data: formData,
    dataType: 'json',
    headers: {'X-CSRF-TOKEN': token},
    beforeSend: function(){
    },
    success: function(data){
      if(data.mensaje=='1'){
        $('.capa').hide();
        var n = noty({text: 'La respuesta fue enviada satisfactoriamente.',type: 'success',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 4000});
        $.get('/listPorResponder',function(data){
          $('#listComentarios').html(data);
        });
      }else{
        $('.capa').hide();
        var n = noty({text: 'Hubo un error al enviar la respuesta.',type: 'error',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 4000});
      }
    },
    error: function(data){
      $('.capa').hide();
      var n = noty({text: 'Hubo un error al intentar cargar la imagen recurda: Solo se permite imagenes en forma JPG,JPEG,BMP,PNG tamaño maximo 1024kb, Resolucion Minima:500x500px | Resolucion Maxima: 1000x1000px',type: 'error',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 4000});
    },
  });
}
function eliminar_consulta(comentario_id){
  var n = noty({
    text: '¿Estas seguro si quieres eliminar la consulta?, ten en cuenta que la informacion luego no se podra recuperar.',
    type: 'notification',
    dismissQueue: true,
    layout: 'topRight',
    theme: 'defaultTheme',
    timeout: 2500,
    force: true,
    killer: true,
    buttons: [
      {addClass: 'btn btn-primary', text: 'Si', onClick: function($noty) {
          $noty.close();
          $.get('/eliminarConsulta/'+comentario_id,function(data){
            $('#listComentarios').html(data);
          });
        }
      },
      {addClass: 'btn btn-danger', text: 'No', onClick: function($noty) {
          $noty.close();
        }
      }
    ]
  });
}
