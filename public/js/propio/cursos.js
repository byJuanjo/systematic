function tipo_descuento(este){
  if(este==''){
    $('#monto_desc').attr("readonly","readonly");
    $('#monto_desc').val('0.00');
    $('#monto_desc').focus();
  }else{
    $('#monto_desc').removeAttr("readonly");
    $('#monto_desc').focus();
  }
}
function crearCurso(){
  curso_id=$('#curso_id').val();
  titulo=$('#titulo').val();
  if(curso_id=='' && titulo!=''){
    formData='titulo='+titulo;
    token=$('#token').val();
    $.ajax({
      url: '/crearCurso',
      type: 'POST',
      data: formData,
      dataType: 'json',
      headers: {'X-CSRF-TOKEN': token},
      beforeSend: function(){
      },
      success: function(data){
        if(data.mensaje!=''){
          $('.capa').hide();
          var n = noty({text: 'Acabas de crear el curso '+titulo+' ahora debes completar todos los demas datos para completar su publicacion en la galeria.',type: 'success',dismissQueue: true,layout: 'center',theme: 'defaultTheme',timeout: 4000});
          $('#curso_id').val(data.mensaje);
        }else if(data.mensaje!='error'){
          $('.capa').hide();
          var n = noty({text: 'Hubo un error al intentar crear el curso.',type: 'error',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 4000});
        }
      },
      error: function(data){
        $('.capa').hide();
        var n = noty({text: 'Reviza los datos ingresados parece que hay un problema.',type: 'error',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 4000});
      },
    });
  }else{
    editarCampo('titulo');
  }
}
function editarCampo(campo){
  curso_id=$('#curso_id').val();
  titulo=$('#titulo').val();
  if(curso_id!='' && titulo!=''){
    valor=$('#'+campo).val();
    formData=new FormData($("#newFormCurso")[0]);
    $.ajax({
      url: '/editCampoCurso',
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
          $('.capa').hide();
          var n = noty({text: 'Acabas de actualizar la informacion del campo',type: 'success',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 4000});

        }else if(data.mensaje!='error'){
          $('.capa').hide();
          var n = noty({text: 'Hubo un error al intentar crear el curso.',type: 'error',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 4000});
        }
      },
      error: function(data){
        $('.capa').hide();
        var n = noty({text: 'Reviza los datos ingresados parece que hay un problema.',type: 'error',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 4000});
      },
    });
  }else{
    var n = noty({text: 'Primero debes agregar el titulo antes de agregar el resto de informacion.',type: 'warning',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 4000});
    $('#'+campo).val('');
  }
}
//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>FUNCI0NES PARA SUBIR IMAGENES AL CURSO
function subirImagenes(){
  curso_id=$('#curso_id').val();
  if(curso_id=='' && titulo==''){
    var n = noty({text: 'Primero debes agregar el titulo antes de agregar imagenes.',type: 'warning',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 4000});
  }else{
    $.get('/cursos.modalImagenes/'+curso_id,function(data){
      $('#imagenesCurso').html(data);
      $('#subirImagenesMd').modal('show');
    });
  }
}
function cargar_imagen_curso(){
  conteo=$('#frm_imagen .required').length;
  variable=0;
  for(i=0;i<conteo;i++){
    if($('#frm_imagen .required:eq('+i+')').val()==''){
      $('#frm_imagen .requerido').fadeIn();
      $('#frm_imagen .required:eq('+i+')').css({'border-color' : 'red'})
      variable=variable+1;
    }else{
      $('#frm_imagen .required:eq('+i+')').css({'border-color' : '#D6D6D6'})
    }
  }
  if(variable>0){
    var n = noty({text: 'Los campos remarcados en rojo son obligatorios',type: 'error',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 2500});
    return false;
  }
  formData=new FormData($("#frm_imagen")[0]);
  $.ajax({
    url: '/subirImagenCurso',
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
      if(data.mensaje==1){
        $.get('/cursos.modalImagenes/'+curso_id,function(data){
          $('#imagenesCurso').html(data);
        });
      }else if(data.mensaje==2){
        var n = noty({text: 'Hubo un error al cargar la Imagen el tamaño, formato o peso no son aceptados.',type: 'error',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 4000});
      }
    },
    error: function(data){
      $('.capa').hide();
      var n = noty({text: 'Hubo un error al cargar la Imagen.',type: 'error',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 4000});
    },
  });
}
function quitarImagenCurso(imagen_id,curso_id){
  $.get('/cursos.quitarImagenes/'+imagen_id+'/'+curso_id,function(data){
    $('#imagenesCurso').html(data);
  });
}
//FUNCIONES PARA CREAR MODULOS AL CURSO
function modalModulo(){
  curso_id=$('#curso_id').val();
  if(curso_id=='' && titulo==''){
    var n = noty({text: 'Primero debes agregar el titulo antes de agregar imagenes.',type: 'warning',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 4000});
  }else{
    $.get('/cursos.modalModulo/'+curso_id,function(data){
      $('#moduloCurso').html(data);
      $('#crearModuloMd').modal('show');
      CKEDITOR.replace('descripcion_mod');
    });
  }
}
function crearModulo(){
  conteo=$('#frm_modulo .required').length;
  variable=0;
  for(i=0;i<conteo;i++){
    if($('#frm_modulo .required:eq('+i+')').val()==''){
      $('#frm_modulo .requerido').fadeIn();
      $('#frm_modulo .required:eq('+i+')').css({'border-color' : 'red'})
      variable=variable+1;
    }else{
      $('#frm_modulo .required:eq('+i+')').css({'border-color' : '#D6D6D6'})
    }
  }
  if(variable>0){
    var n = noty({text: 'Los campos remarcados en rojo son obligatorios',type: 'error',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 2500});
    return false;
  }
  formData=new FormData($("#frm_modulo")[0]);
  $.ajax({
    url: '/crearModulo',
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
      if(data.mensaje!=''){
        $('#modulo_id').val(data.mensaje);
        $('#modulo_id1').val(data.mensaje);
        $.get('/cursos.modalCurso/'+curso_id,function(data){
          $('#modulosCurso').html(data);
          $('#btn_modulo').hide();
          $('.caracteristicasAdd').show();
        });
      }
    },
    error: function(data){
      $('.capa').hide();
      var n = noty({text: 'Hubo un error al cargar la Imagen.',type: 'error',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 4000});
    },
  });
}
function crearCaracteristicaModulo(){
  CKupdate();
  modulo_id=$('#modulo_id').val();
  conteo=$('#frm_modulo_caracteristica .required').length;
  variable=0;
  for(i=0;i<conteo;i++){
    if($('#frm_modulo_caracteristica .required:eq('+i+')').val()==''){
      $('#frm_modulo_caracteristica .requerido').fadeIn();
      $('#frm_modulo_caracteristica .required:eq('+i+')').css({'border-color' : 'red'})
      variable=variable+1;
    }else{
      $('#frm_modulo_caracteristica .required:eq('+i+')').css({'border-color' : '#D6D6D6'})
    }
  }
  if(variable>0){
    var n = noty({text: 'Los campos remarcados en rojo son obligatorios',type: 'error',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 2500});
    return false;
  }
  formData=new FormData($("#frm_modulo_caracteristica")[0]);
  $.ajax({
    url: '/crearModuloCaracteristica',
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
      if(data.mensaje==1){
        $.get('/cursos.listCaracteristicas/'+modulo_id,function(data){
          $('#showCaracteristicas').html(data);
          $("#frm_modulo_caracteristica")[0].reset();
          CKEDITOR.instances.descripcion_mod.setData(" ")
        });
      }
    },
    error: function(data){
      $('.capa').hide();
      var n = noty({text: 'Hubo un error al cargar la Imagen.',type: 'error',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 4000});
    },
  });
}
function quitarCaracteristicaModulo(caracteristica_id){
  modulo_id=$('#modulo_id').val();
  $.get('/cursos.quitarCaracteristicas/'+caracteristica_id,function(data){
    $('#showCaracteristicas').html(data);
  });
}
function editarModulo(modulo_id){
  $('#moduloCurso').html(' ');
  $.get('/cursos.editModulo/'+modulo_id,function(data){
    $('#editModulo').html(data);
    $('#editModuloMd').modal('show');
  });
}
function updateModulo(){
  curso_id=$('#curso_id').val();
  conteo=$('#frm_edit_modulo .required').length;
  variable=0;
  for(i=0;i<conteo;i++){
    if($('#frm_edit_modulo .required:eq('+i+')').val()==''){
      $('#frm_edit_modulo .requerido').fadeIn();
      $('#frm_edit_modulo .required:eq('+i+')').css({'border-color' : 'red'})
      variable=variable+1;
    }else{
      $('#frm_edit_modulo .required:eq('+i+')').css({'border-color' : '#D6D6D6'})
    }
  }
  if(variable>0){
    var n = noty({text: 'Los campos remarcados en rojo son obligatorios',type: 'error',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 2500});
    return false;
  }
  formData=new FormData($("#frm_edit_modulo")[0]);
  $.ajax({
    url: '/updateModulo',
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
      if(data.mensaje==1){
        var n = noty({text: 'Se actualizo la información del modulo.',type: 'success',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 4000});
        $.get('/cursos.modalCurso/'+curso_id,function(data){
          $('#modulosCurso').html(data);
          $('#btn_modulo').hide();
          $('.caracteristicasAdd').show();
        });
      }else{
        var n = noty({text: 'No se pudo actualizar la información.',type: 'error',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 4000});
      }
    },
    error: function(data){
      $('.capa').hide();
      var n = noty({text: 'Hubo un error al cargar la Imagen.',type: 'error',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 4000});
    },
  });
}
function editarCaracteristicaModulo(formulario){
  CKupdate();
  formData=new FormData($("#"+formulario)[0]);
  $.ajax({
    url: '/editarCaracteristicaModulo',
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
      if(data.mensaje==1){
        var n = noty({text: 'Se actualizo la informacion de la cartacteristica.',type: 'success',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 4000});
      }else{
        var n = noty({text: 'No se pudo actualizar la informacion.',type: 'error',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 4000});
      }
    },
    error: function(data){
      $('.capa').hide();
      var n = noty({text: 'Hubo un error al cargar la Imagen.',type: 'error',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 4000});
    },
  });
}
//FUNCIONES PARA SUBIR SILABUS
function modalSilabo(){
  curso_id=$('#curso_id').val();
  if(curso_id=='' && titulo==''){
    var n = noty({text: 'Primero debes agregar el titulo antes de agregar imagenes.',type: 'warning',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 4000});
  }else{
    $.get('/cursos.modalSilabo/'+curso_id,function(data){
      $('#SilaboCurso').html(data);
      $('#crearSilaboMd').modal('show');
    });
  }
}
function cargar_silabo_curso(){
  conteo=$('#frm_silabo_curso .required').length;
  variable=0;
  for(i=0;i<conteo;i++){
    if($('#frm_silabo_curso .required:eq('+i+')').val()==''){
      $('#frm_silabo_curso .requerido').fadeIn();
      $('#frm_silabo_curso .required:eq('+i+')').css({'border-color' : 'red'})
      variable=variable+1;
    }else{
      $('#frm_silabo_curso .required:eq('+i+')').css({'border-color' : '#D6D6D6'})
    }
  }
  if(variable>0){
    var n = noty({text: 'Los campos remarcados en rojo son obligatorios',type: 'error',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 2500});
    return false;
  }
  $.ajax({
    url: '/subirSilaboCurso',
    headers: {'X-CSRF-TOKEN': token},
    data:new FormData($("#frm_silabo_curso")[0]),
    dataType:'json',
    async:false,
    type:'post',
    processData: false,
    contentType: false,
    beforeSend: function(){
    },
    success: function(data){
      if(data.mensaje==1){

        $('#crearSilaboMd').modal('hide');
        var n = noty({text: 'Se cargo correctamente el Sílabo.',type: 'success',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 4000});
      }
    },
    error: function(data){
      $('.capa').hide();
      var n = noty({text: 'Hubo un error al cargar la Imagen.',type: 'error',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 4000});
    },
  });
}
//FUNCIONES PARA OFERTAS
function agregar_oferta(curso_id){
  $.get('/cursos.ofertas/'+curso_id,function(data){
    $('#AddOfertas').html(data);
    $('#agregarofertasMd').modal('show');
  });
}
function guardarOferta(){
  $('.capa').show();
  formOferta=$('#frm_oferta').serialize();
  token=$('#token').val();
  $.ajax({
    url: '/cursos.guardarOferta',
    type: 'POST',
    data: formOferta,
    dataType: 'json',
    headers: {'X-CSRF-TOKEN': token},
    beforeSend: function(){
    },
    success: function(data){
      if(data.mensaje!=''){
        $('.capa').hide();
        var n = noty({text: 'Acabas de crear una oferta para este curso.',type: 'success',dismissQueue: true,layout: 'center',theme: 'defaultTheme',timeout: 4000});
        curso_id=$('#curso_id').val();
        $.get('/cursos.ofertasEdit/'+curso_id,function(data){
          $('.ofertas_modulos').html(data);
          $('#agregarofertasMd').modal('hide');
        });
      }else if(data.mensaje!='error'){
        $('.capa').hide();
        var n = noty({text: 'Hubo un error al intentar crear la oferta.',type: 'error',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 4000});
      }
    },
    error: function(data){
      $('.capa').hide();
      var n = noty({text: 'Reviza los datos ingresados parece que hay un problema.',type: 'error',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 4000});
    },
  });
}
function editarOferta(oferta_id){
  $.get('/cursos.editOfertas/'+oferta_id,function(data){
    $('#AddOfertas').html(data);
    $('#agregarofertasMd').modal('show');
  });
}
function updateOferta(){
  $('.capa').show();
  formOferta=$('#frm_oferta_edit').serialize();
  token=$('#token').val();
  $.ajax({
    url: '/cursos.updateOferta',
    type: 'POST',
    data: formOferta,
    dataType: 'json',
    headers: {'X-CSRF-TOKEN': token},
    beforeSend: function(){
    },
    success: function(data){
      if(data.mensaje!=''){
        $('.capa').hide();
        var n = noty({text: 'Acabas de actualizar la oferta.',type: 'success',dismissQueue: true,layout: 'center',theme: 'defaultTheme',timeout: 4000});
        curso_id=$('#curso_id').val();
        $.get('/cursos.ofertasEdit/'+curso_id,function(data){
          $('.ofertas_modulos').html(data);
          $('#agregarofertasMd').modal('hide');
        });
      }else if(data.mensaje!='error'){
        $('.capa').hide();
        var n = noty({text: 'Hubo un error al actualizar la oferta.',type: 'error',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 4000});
      }
    },
    error: function(data){
      $('.capa').hide();
      var n = noty({text: 'Reviza los datos ingresados parece que hay un problema.',type: 'error',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 4000});
    },
  });
}
function eliminarOferta(oferta_id){
  var n = noty({
    text: '¿Estás seguro de eliminar este contrato?, Lo podras agregar nuevamente con el boton "Selecciona Contratos"',
    type: 'notification',
    dismissQueue: true,
    layout: 'topRight',
    theme: 'defaultTheme',
    buttons: [
      {addClass: 'btn btn-primary', text: 'Si', onClick: function($noty) {
          $noty.close();
          $('.capa').show();
          formOferta='oferta_id='+oferta_id;
          token=$('#token').val();
          $.ajax({
            url: '/cursos.eliminarOferta',
            type: 'POST',
            data: formOferta,
            dataType: 'json',
            headers: {'X-CSRF-TOKEN': token},
            beforeSend: function(){
            },
            success: function(data){
              if(data.mensaje!=''){
                $('.capa').hide();
                var n = noty({text: 'Se elimino correctamente.',type: 'success',dismissQueue: true,layout: 'center',theme: 'defaultTheme',timeout: 4000});
                curso_id=$('#curso_id').val();
                $.get('/cursos.ofertasEdit/'+curso_id,function(data){
                  $('.ofertas_modulos').html(data);
                  $('#agregarofertasMd').modal('hide');
                });
              }else if(data.mensaje!='error'){
                $('.capa').hide();
                var n = noty({text: 'Hubo un error al intentar eliminar la oferta.',type: 'error',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 4000});
              }
            },
            error: function(data){
              $('.capa').hide();
              var n = noty({text: 'Reviza los datos ingresados parece que hay un problema.',type: 'error',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 4000});
            },
          });
        }
      },
      {addClass: 'btn btn-danger', text: 'Cancelar', onClick: function($noty) {
          $noty.close();
          noty({dismissQueue: true, force: true, layout:  'bottom', theme: 'default', text: 'Cancelaste la eliminacion del contrato', type: 'information',timeout: 2500});
        }
      }
    ]
  });
}
