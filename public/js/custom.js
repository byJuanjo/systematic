function modificar_banner(){
  $.get('banner',function(data){
    $('#modalBannerContent').html(data);
    $('#modalBanner').modal('show');
  });
}
function actualizarBanner(){
  $('.capa').show();
  formData=new FormData($("#banner_form")[0]);
  token=$('#token').val();
  $.ajax({
    url: '/actualizarBanner',
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
        var n = noty({text: 'Acabas de actualizar la informacion del banner',type: 'success',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 4000});
        location.reload();
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
}
function suscribirse(formulario){
  if(formulario=='#contactForm'){
    email=$('#contactForm #email').val();
    cursos_id=$('#contactForm #cursos_id').val();
  }else if(formulario=='#contactForm1'){
    email=$('#contactForm1 #email').val();
    cursos_id=$('#contactForm1 #cursos_id').val();
  }
  if(email==''){
    var n = noty({text: 'El campo correo es obligatorio.',type: 'error',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 4000});
      if(formulario=='#contactForm'){
        $('#contactForm #email').focus();
        $('#contactForm #email').css({'border-color' : 'red'});
      }else if(formulario=='#contactForm1'){
        $('#contactForm1 #email').focus();
        $('#contactForm1 #email').css({'border-color' : 'red'});
      }
    return false;
  }else{
    if(email.indexOf('@', 0) == -1 || email.indexOf('.', 0) == -1) {
      var n = noty({text: 'El correo no es valido.',type: 'error',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 4000});
      return false;
    }
  }
  if(cursos_id==''){
    var n = noty({text: 'El campo curso es obligatorio.',type: 'error',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 4000});
      if(formulario=='#contactForm'){
        $('#contactForm #cursos_id').css({'border-color' : 'red'});
      }else if(formulario=='#contactForm1'){
        $('#contactForm1 #cursos_id').css({'border-color' : 'red'});
      }
    return false;
  }
  formData=$(formulario).serialize();
  token=$('#token').val();
  miurl='/suscribirse';
  $.ajax({
    url: miurl,
    headers: {'X-CSRF-TOKEN': token},
    type: 'POST',
    data: formData,
    dataType: 'json',
    beforeSend: function(){
      $('.capa').show();
    },
    success: function(data){
      if(data.mensaje=='1'){
        var n = noty({text: 'Acabas de suscribirte a nuestro boletin de noticias, en breve recibiras las mejores ofertas.',type: 'success',dismissQueue: true,layout: 'center',theme: 'defaultTheme',timeout: 4000});
        $(formulario)[0].reset();
        $('.capa').hide();
      }else if(data.mensaje=='2'){
        var n = noty({text: 'Tu correo ya se encuentra suscrito a nuestro boletin, gracias por el interes.',type: 'error',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 4000});
        $(formulario)[0].reset();
        $('.capa').hide();
      }else if(data.mensaje=='3'){
        var n = noty({text: 'Tu correo ya se encuentra suscrito a nuestro boletin pero se encontraba desactivado para recibir noticias, en este mommento lo hemos vuelto activar, gracias por el interes.',type: 'warning',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 4000});
        $(formulario)[0].reset();
        $('.capa').hide();
      }
    },
    error: function(data){
      var n = noty({text: 'Hubo un error al intentar agregar el registro.',type: 'error',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 4000});
      $('.capa').hide();
    },
  });
}
function exportar_suscritos(){
  route="exportarSuscritos";
  window.open(route, "nuevo", "directories=no, location=no, menubar=no, scrollbars=yes, statusbar=no, tittlebar=no, width=1200, height=600")
}
function actualizar_informacion(){
  suscripcion_id=$('#suscripcion_id').val();
  if(suscripcion_id==''){
    var n = noty({text: 'Primero debes elegir un registro de la tabla dandole click.',type: 'warning',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 4000});
    return false;
  }else{
    $.get('suscripcionContent/'+suscripcion_id,function(data){
      $('#contentSusc').html(data);
      $('#editSuscripcion').modal('show');
    });
  }
}
function actualizar_suscripcion(){
  formData=$('#frmsuscripcion').serialize();
  token=$('#token').val();
  miurl='/updateSuscripcion';
  $.ajax({
    url: miurl,
    headers: {'X-CSRF-TOKEN': token},
    type: 'POST',
    data: formData,
    dataType: 'json',
    beforeSend: function(){
      $('.capa').show();
    },
    success: function(data){
      if(data.mensaje=='1'){
        var n = noty({text: 'Acabas de actualizar la informacion de unas suscripción.',type: 'success',dismissQueue: true,layout: 'center',theme: 'defaultTheme',timeout: 4000});
        $('#editSuscripcion').modal('hide');
        $('.capa').hide();
        cargar_suscriptores();
      }
    },
    error: function(data){
      var n = noty({text: 'Hubo un error al intentar actualizar la información.',type: 'error',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 4000});
      $('.capa').hide();
    },
  });
}
function telemarketing_update(){
  suscripcion_id=$('#suscripcion_id').val();
  if(suscripcion_id==''){
    var n = noty({text: 'Primero debes elegir un registro de la tabla dandole click.',type: 'warning',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 4000});
    return false;
  }else{
    formData='suscripcion_id='+suscripcion_id;
    token=$('#token').val();
    miurl='/updateTelemarketing';
    $.ajax({
      url: miurl,
      headers: {'X-CSRF-TOKEN': token},
      type: 'POST',
      data: formData,
      dataType: 'json',
      beforeSend: function(){

      },
      success: function(data){
        if(data.mensaje=='1'){
          var n = noty({text: 'Acabas de actualizar la informacion del telemarketing.',type: 'success',dismissQueue: true,layout: 'center',theme: 'defaultTheme',timeout: 4000});
          $('#editSuscripcion').modal('hide');
          cargar_suscriptores();
        }
      },
      error: function(data){
        var n = noty({text: 'Hubo un error al intentar actualizar la información.',type: 'error',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 4000});
        $('.capa').hide();
      },
    });
  }

}
