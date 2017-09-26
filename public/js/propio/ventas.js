function buscar_user(){
  dni=$('#dni').val();
  if(dni.length<8){
    var n = noty({text: 'El documento debe tener 8 u 11 digitos.',type: 'success',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 4000});
    $('#user_data').html("<h3 style='margin-bottom:0px'>Para realizar una venta digita primero el DNI.</h3><input type='hidden' class='form-control required' name='user_id' id='user_id' value=''>");
    return false;
  }
  $.get('/ventas.buscarUsuario/'+dni,function(data){
    if(data.mensaje!='0'){
      $('#user_data').html(data);
    }else{
      $('#user_data').html("<h3 style='margin-bottom:0px'>Para realizar una venta digita primero el DNI.</h3><input type='hidden' class='form-control required' name='user_id' id='user_id' value=''>");
      $('#new_user').modal('show');
      $('#new_documento').val(dni);
      setTimeout(function(){
        $('#new_name').focus();
      },700);
    }
  });
}
function validar_correo(){
  user_id=$('#user_id').val();email=$('#email').val();
  formData='user_id='+user_id+'&email='+email;
  token=$('#token').val();
  $.ajax({
    url: '/ventas.validarEmail',
    type: 'POST',
    data: formData,
    dataType: 'json',
    headers: {'X-CSRF-TOKEN': token},
    beforeSend: function(){
    },
    success: function(data){
      if(data.mensaje==0){

      }else if(data.mensaje==1){
        var n = noty({text: 'Este correo ya se encuentra creado con otro usuario.',type: 'error',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 4000});
        $('#email').val('');
      }
    },
    error: function(data){
      var n = noty({text: 'Reviza los datos ingresados parece que hay un problema.',type: 'error',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 4000});
    },
  });
}
function validar_newcorreo(){
  email=$('#new_email').val();
  formData='email='+email;
  token=$('#token').val();
  $.ajax({
    url: '/ventas.validarNewEmail',
    type: 'POST',
    data: formData,
    dataType: 'json',
    headers: {'X-CSRF-TOKEN': token},
    beforeSend: function(){
    },
    success: function(data){
      if(data.mensaje==0){

      }else if(data.mensaje==1){
        var n = noty({text: 'Este correo ya se encuentra creado con otro usuario.',type: 'error',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 4000});
        $('#new_email').val('');
      }
    },
    error: function(data){
      var n = noty({text: 'Reviza los datos ingresados parece que hay un problema.',type: 'error',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 4000});
    },
  });
}
function actualizar_user(){
  user_id=$('#user_id').val();name=$('#name').val();apellido=$('#apellido').val();email=$('#email').val();celular=$('#celular').val();
  if(email==''){
    $('#email').css({'border-color' : '#D6D6D6'});
    var n = noty({text: 'El campo correo es obligatorio.',type: 'warning',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 4000});
    return false;
  }
  formData='user_id='+user_id+'&name='+name+'&apellido='+apellido+'&email='+email+'&celular='+celular;
  token=$('#token').val();
  $.ajax({
    url: '/ventas.actualizarUser',
    type: 'POST',
    data: formData,
    dataType: 'json',
    headers: {'X-CSRF-TOKEN': token},
    beforeSend: function(){
    },
    success: function(data){
      if(data.mensaje!=''){
        $('.capa').hide();
        var n = noty({text: 'Se actualizo la información del usuario correctamente.',type: 'success',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 4000});
      }else if(data.mensaje!='error'){
        var n = noty({text: 'Hubo un error al intentar crear el curso.',type: 'error',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 4000});
      }
    },
    error: function(data){
      var n = noty({text: 'Reviza los datos ingresados parece que hay un problema.',type: 'error',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 4000});
    },
  });
}
function crear_user(){
  conteo=$('#fr_newUser .required').length;
  variable=0;
  for(i=0;i<conteo;i++){
    if($('#fr_newUser .required:eq('+i+')').val()==''){
      $('#fr_newUser .requerido').fadeIn();
      $('#fr_newUser .required:eq('+i+')').css({'border-color' : 'red'})
      variable=variable+1;
    }else{
      $('#fr_newUser .required:eq('+i+')').css({'border-color' : '#D6D6D6'})
    }
  }
  if(variable>0){
    var n = noty({text: 'Los campos remarcados en rojo son obligatorios',type: 'error',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 2500});
    return false;
  }
  formData=$('#fr_newUser').serialize();
  $.ajax({
    url: '/ventas.crearUser',
    type: 'POST',
    data: formData,
    dataType: 'json',
    headers: {'X-CSRF-TOKEN': token},
    beforeSend: function(){
    },
    success: function(data){
      if(data.mensaje=='1'){
        $('.capa').hide();
        var n = noty({text: 'Se creo correctamente el usuario.',type: 'success',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 4000});
        $('#new_user').modal('hide');
        $('#fr_newUser')[0].reset();
        buscar_user();
      }else if(data.mensaje!='error'){
        var n = noty({text: 'Hubo un error al intentar crear el usuario.',type: 'error',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 4000});
      }
    },
    error: function(data){
      var n = noty({text: 'Reviza los datos ingresados parece que hay un problema.',type: 'error',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 4000});
    },
  });
}
function buscar_horarios(){
  user_id=$('#user_id').val();
  if(user_id==''){
    var n = noty({text: 'Primero debes elegir un Usuario para  continuar.',type: 'warning',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 4000});
    $('#dni').focus();
    $('#cursos_id').val('');
    return false;
  }else{
    curso_id=$('#cursos_id').val();
    if(curso_id==''){
      $('#div_horario').html('');
      $('#div_oferta').html('');
      $('#precio').val('');
      $('#acuenta').val('');
      $('#saldo').val('');
    }else{
      $.get('/ventas.buscarHorario/'+curso_id,function(data){
        $('#div_horario').html(data);
      });
      $.get('/ventas.buscarModulos/'+curso_id,function(data){
        $('#modulos_id').html(data);
      });
      $.get('/ventas.buscarOfertas/'+curso_id,function(data){
        $('#ofertas_id').html(data);
      });
      $('#div_oferta').html('');
    }
  }
}
function buscar_modulos(){
  modulos_id=$('#modulos_id').val();
  if(modulos_id==''){
    $('#precio').val('');
  }else{
    $('#ofertas_id').val('');
    $('#div_oferta').html('');
    $.get('/ventas.traePrecioModulo/'+modulos_id,function(data){
      $('#precio').val(data.mensaje);
    });
  }
}
function buscarOfertas(){
  ofertas_id=$('#ofertas_id').val();
  $('#modulos_id').val('');
  if(ofertas_id==''){
    $('#div_oferta').html('');
    $('#precio').val('');
  }else {
    $.get('/ventas.traeOferta/'+ofertas_id,function(data){
      $('#div_oferta').html(data);
      getPrecio=$('.precio_result').html();
      $('#precio').val(getPrecio);
    });
  }
}
function calcula_saldo(){
  precio=$('#precio').val();
  acuenta=$('#acuenta').val();
  if(precio==''){
    var n = noty({text: 'No puedes dejar a cuenta si aun no tienes el precio de la compra.',type: 'warning',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 4000});
    setTimeout(function(){
      $('#acuenta').val('');
    },100);
    return false
  }
  if(parseInt(acuenta)>parseInt(precio)){
    var n = noty({text: 'Lo que dejas a cuenta no puede ser mayor al precio de la compra.',type: 'warning',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 4000});
    $('#acuenta').val('');
    $('#saldo').val('');
    return false;
  }else{
    saldo=parseInt(precio)-parseInt(acuenta);
    $('#saldo').val(saldo);
  }
}


function guardar_venta(){
  conteo=$('#frm_individual .required').length;
  variable=0;
  for(i=0;i<conteo;i++){
    if($('#frm_individual .required:eq('+i+')').val()==''){
      $('#frm_individual .requerido').fadeIn();
      $('#frm_individual .required:eq('+i+')').css({'border-color' : 'red'})
      variable=variable+1;
    }else{
      $('#frm_individual .required:eq('+i+')').css({'border-color' : '#D6D6D6'})
    }
  }
  if(variable>0){
    var n = noty({text: 'Los campos remarcados en rojo son obligatorios',type: 'error',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 2500});
    return false;
  }
  formData=$('#frm_individual').serialize();
  $.ajax({
    url: '/ventas.crearVenta',
    type: 'POST',
    data: formData,
    dataType: 'json',
    headers: {'X-CSRF-TOKEN': token},
    beforeSend: function(){
    },
    success: function(data){
      if(data.mensaje!=0){
        $('.capa').hide();
        var n = noty({text: 'Se realizo la primera parte de la venta.',type: 'success',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 4000});
        $('#frm_individual')[0].reset();
        $('#div_horario').html('');
        $('#div_oferta').html('');
        actualiza_historial();
        $('#user_data').html("<h3 style='margin-bottom:0px'>Para realizar una venta digita primero el DNI.</h3><input type='hidden' class='form-control required' name='user_id' id='user_id' value=''>");
        venta_id=data.mensaje;
        $.get('/ventas.asignarHorario/'+venta_id,function(data){
          $('#asigHorario_content').html(data);
          $('#asigHorario').modal('show');
        });


      }else if(data.mensaje!='error'){
        var n = noty({text: 'Hubo un error al intentar crear el usuario.',type: 'error',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 4000});
      }
    },
    error: function(data){
      var n = noty({text: 'Reviza los datos ingresados parece que hay un problema.',type: 'error',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 4000});
    },
  });
}


//*****FUNCIONES PARA PESTAÑA MI HISTORIAL**************************************
//******************************************************************************
function actualiza_historial(){
  $.get('/ventas.miHistorial',function(data){
    $('#miHistorial_content').html(data);
    table=$('#tb_miHistorial').DataTable({
      "destroy": true,
      "processing" : true,
      "serverSide" : true,
      "columns"    : [
        {data:'id'},
        {data:'tipoVenta'},
        {data:'user.razon_social'},
        {data:'cursos.titulo'},
        {data:'precio'},
      ],
      ajax: {
        'url': 'pagination_miHistorial',
        'type': 'POST',
        'headers': {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        }
      },
    });
    $('#tb_miHistorial tbody').on('click', 'tr', function () {
      $("#tb_miHistorial tbody tr").removeClass('selected');
        fila=$("#tb_miHistorial tbody tr")[table.row( this ).index()].innerHTML;
        codigo=$(fila)[0].innerHTML;
        if ( $(this).hasClass('selected') ) {
          $(this).removeClass('selected');
          $('#ventas_hi_id').val('');
        }
        else {
        table.$('tr.selected').removeClass('selected');
          $(this).addClass('selected');
          $('#ventas_hi_id').val(codigo);
        }
    });
  });
}
function ver_detalles_historial(){
  venta_id=$('#ventas_hi_id').val();
  if(venta_id==''){
    var n = noty({text: 'Primero debes seleccionar una venta del historial.',type: 'warning',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 4000});
    return false;
  }
  $.get('/ventas.buscarHistoryVenta/'+venta_id,function(data){
    $('#contentHistory').html(data);
    $('#detallesHistorial').modal('show');
  });
}
function realizar_pago(){
  venta_historial_id=$('#venta_historial_id').val();
  $.get('/ventas.realizarPago/'+venta_historial_id,function(data){
    $('#nuevo_pago').html(data);
    $('#new_pago').modal('show');
  });
}
function asignarHorario(formulario){
  formData=$(formulario).serialize();
  horario=$(formulario + ' > #horario_venta').val();
  if(horario==''){
    var n = noty({text: 'Primero debes selecccionar un horario para poder asiganarlo a este modulo.',type: 'warning',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 4000});
    return false;
  }
  token=$('#token').val();
  $.ajax({
    url: '/ventas.colocarHorario',
    type: 'POST',
    data: formData,
    dataType: 'json',
    headers: {'X-CSRF-TOKEN': token},
    beforeSend: function(){
    },
    success: function(data){
      if(data.mensaje==1){
        var n = noty({text: 'Acabas de Asignar el horario al modulo.',type: 'success',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 4000});
      }
    },
    error: function(data){
      var n = noty({text: 'Reviza los datos ingresados parece que hay un problema.',type: 'error',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 4000});
    },
  });
}
function calcula_saldo_pago(){
  precio=$('#frm_pago_saldo #precio').val();
  acuenta=$('#frm_pago_saldo #acuenta').val();

  if(parseInt(acuenta)>parseInt(precio)){
    var n = noty({text: 'Lo que dejas a cuenta no puede ser mayor al precio de la compra.',type: 'warning',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 4000});
    $('#frm_pago_saldo #acuenta').val('');
    $('#frm_pago_saldo #saldo').val('');
    return false;
  }else{
    saldo=parseInt(precio)-parseInt(acuenta);
    $('#frm_pago_saldo #saldo').val(saldo);
  }
}
function pagar_saldo(){
  conteo=$('#frm_pago_saldo .required').length;
  variable=0;
  for(i=0;i<conteo;i++){
    if($('#frm_pago_saldo .required:eq('+i+')').val()==''){
      $('#frm_pago_saldo .requerido').fadeIn();
      $('#frm_pago_saldo .required:eq('+i+')').css({'border-color' : 'red'})
      variable=variable+1;
    }else{
      $('#frm_pago_saldo .required:eq('+i+')').css({'border-color' : '#D6D6D6'})
    }
  }
  if(variable>0){
    var n = noty({text: 'Los campos remarcados en rojo son obligatorios',type: 'error',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 2500});
    return false;
  }
  formData=$('#frm_pago_saldo').serialize();
  token=$('#token').val();
  $.ajax({
    url: '/ventas.pagarSaldo',
    type: 'POST',
    data: formData,
    dataType: 'json',
    headers: {'X-CSRF-TOKEN': token},
    beforeSend: function(){
    },
    success: function(data){
    if(data.mensaje!=0){
        var n = noty({text: 'Acabas de realizar el pago.',type: 'error',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 4000});
        $('#new_pago').modal('hide');

      }
    },
    error: function(data){
      var n = noty({text: 'Reviza los datos ingresados parece que hay un problema.',type: 'error',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 4000});
    },
  });
}
