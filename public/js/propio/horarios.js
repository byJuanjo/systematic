function agregar_laboratorio(){
  conteo=$('#frLab .required').length;
  variable=0;
  for(i=0;i<conteo;i++){
    if($('#frLab .required:eq('+i+')').val()==''){
      $('#frLab .requerido').fadeIn();
      $('#frLab .required:eq('+i+')').css({'border-color' : 'red'})
      variable=variable+1;
    }else{
      $('#frLab .required:eq('+i+')').css({'border-color' : '#D6D6D6'})
    }
  }
  if(variable>0){
    var n = noty({text: 'Los campos remarcados en rojo son obligatorios',type: 'error',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 2500});
    return false;
  }
  formData=$('#frLab').serialize();
  token=$('#token').val();
  miurl='/horarios.addLaboratorio';
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
        var n = noty({text: 'Se agrego correctamente el registro.',type: 'success',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 4000});
        $.get('/horarios.dataLab',function(data){
          $('#frLab')[0].reset();
          $('#datosLb').html(data);
          cargar_dataTableLb();
        });
        $('.capa').hide();
      }else{
        var n = noty({text: 'Hubo un error al intentar agregar el registro.',type: 'error',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 4000});
        $('.capa').hide();
      }
    },
    error: function(data){
      var n = noty({text: 'Hubo un error al intentar agregar el registro.',type: 'error',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 4000});
      $('.capa').hide();
    },
  });
}
function show_editLab(){
  laboratorio_id=$('#laboratorios_id').val();
  $.get('/horarios.showLab/'+laboratorio_id,function(data){
    $('#editLab').html(data);
  });
}
function actualizar_laboratorio(){
  conteo=$('#frLabEdit .required').length;
  variable=0;
  for(i=0;i<conteo;i++){
    if($('#frLabEdit .required:eq('+i+')').val()==''){
      $('#frLabEdit .requerido').fadeIn();
      $('#frLabEdit .required:eq('+i+')').css({'border-color' : 'red'})
      variable=variable+1;
    }else{
      $('#frLabEdit .required:eq('+i+')').css({'border-color' : '#D6D6D6'})
    }
  }
  if(variable>0){
    var n = noty({text: 'Los campos remarcados en rojo son obligatorios',type: 'error',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 2500});
    return false;
  }
  formData=$('#frLabEdit').serialize();
  token=$('#token').val();
  miurl='/horarios.editLaboratorio';
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
        var n = noty({text: 'Se actualizo correctamente el registro.',type: 'success',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 4000});
        $.get('/horarios.dataLab',function(data){
          $('#editLab').html('<h3 class="text-color-tertiary">Elige un registor de la tabla para ver sus datos.</h3>');
          $('#datosLb').html(data);
          ver('datos');
          cargar_dataTableLb();
        });
        $('.capa').hide();
      }else{
        var n = noty({text: 'Hubo un error al intentar agregar el registro.',type: 'error',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 4000});
        $('.capa').hide();
      }
    },
    error: function(data){
      var n = noty({text: 'Hubo un error al intentar agregar el registro.',type: 'error',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 4000});
      $('.capa').hide();
    },
  });
}
//****************DOCENTES******************************************************
function agregar_docente(){
  conteo=$('#frDoc .required').length;
  variable=0;
  for(i=0;i<conteo;i++){
    if($('#frDoc .required:eq('+i+')').val()==''){
      $('#frDoc .requerido').fadeIn();
      $('#frDoc .required:eq('+i+')').css({'border-color' : 'red'})
      variable=variable+1;
    }else{
      $('#frDoc .required:eq('+i+')').css({'border-color' : '#D6D6D6'})
    }
  }
  if(variable>0){
    var n = noty({text: 'Los campos remarcados en rojo son obligatorios',type: 'error',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 2500});
    return false;
  }
  formData=$('#frDoc').serialize();
  token=$('#token').val();
  miurl='/horarios.addDocente';
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
        var n = noty({text: 'Se agrego correctamente el registro.',type: 'success',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 4000});
        $.get('/horarios.dataDoc',function(data){
          $('#frDoc')[0].reset();
          $('#datosDc').html(data);
          cargar_dataTableDoc();
        });
        $('.capa').hide();
      }else{
        var n = noty({text: 'Hubo un error al intentar agregar el registro.',type: 'error',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 4000});
        $('.capa').hide();
      }
    },
    error: function(data){
      var n = noty({text: 'Hubo un error al intentar agregar el registro.',type: 'error',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 4000});
      $('.capa').hide();
    },
  });
}

function show_editDoc(){
  docentes_id=$('#docentes_id').val();
  $.get('/horarios.showDoc/'+docentes_id,function(data){
    $('#editDoc').html(data);
  });
}
function actualizar_docente(){
  conteo=$('#frDocEdit .required').length;
  variable=0;
  for(i=0;i<conteo;i++){
    if($('#frDocEdit .required:eq('+i+')').val()==''){
      $('#frDocEdit .requerido').fadeIn();
      $('#frDocEdit .required:eq('+i+')').css({'border-color' : 'red'})
      variable=variable+1;
    }else{
      $('#frDocEdit .required:eq('+i+')').css({'border-color' : '#D6D6D6'})
    }
  }
  if(variable>0){
    var n = noty({text: 'Los campos remarcados en rojo son obligatorios',type: 'error',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 2500});
    return false;
  }
  formData=$('#frDocEdit').serialize();
  token=$('#token').val();
  miurl='/horarios.editDocente';
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
        var n = noty({text: 'Se actualizo correctamente el registro.',type: 'success',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 4000});
        $.get('/horarios.dataDoc',function(data){
          $('#editDoc').html('<h3 class="text-color-tertiary">Elige un registor de la tabla para ver sus datos.</h3>');
          $('#datosDc').html(data);
          ver('datos');
          cargar_dataTableDoc();
        });
        $('.capa').hide();
      }else{
        var n = noty({text: 'Hubo un error al intentar agregar el registro.',type: 'error',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 4000});
        $('.capa').hide();
      }
    },
    error: function(data){
      var n = noty({text: 'Hubo un error al intentar agregar el registro.',type: 'error',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 4000});
      $('.capa').hide();
    },
  });
}
//FUNCIONES PARA LA GENERACION DE HORARIOS
function habilitar(este,input){
  if($(este).is(':checked')){
    general_inicio=$('#hora_general').val();
    general_fin=$('#hora_generalf').val();
    $('#'+input+'_hora').val(general_inicio);
    $('#'+input+'_horaf').val(general_fin);
    $('#'+input+'_hora').removeAttr("readonly");
    $('#'+input+'_horaf').removeAttr("readonly");
  }else{
    $('#'+input+'_hora').val(' ');
    $('#'+input+'_horaf').val(' ');
    $('#'+input+'_hora').attr("readonly","readonly");
    $('#'+input+'_horaf').attr("readonly","readonly");
  }
}
function buscarModulo(curso_id){
  $.get('/horarios.buscarModulo/'+curso_id,function(data){
    $('#modulos_id').html(data);
  });
}
function agregar_horario(){
  conteo=$('#frHor .required').length;
  variable=0;
  for(i=0;i<conteo;i++){
    if($('#frHor .required:eq('+i+')').val()==''){
      $('#frHor .requerido').fadeIn();
      $('#frHor .required:eq('+i+')').css({'border-color' : 'red'})
      variable=variable+1;
    }else{
      $('#frHor .required:eq('+i+')').css({'border-color' : '#D6D6D6'})
    }
  }
  if(variable>0){
    var n = noty({text: 'Los campos remarcados en rojo son obligatorios',type: 'error',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 2500});
    return false;
  }
  formData=$('#frHor').serialize();
  token=$('#token').val();
  miurl='/horarios.addHorario';
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
        var n = noty({text: 'Se agrego correctamente el registro.',type: 'success',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 4000});
        $.get('/horarios.datos/',function(data){
          $('#datosHo').html(data);
          $.get('/horarios.agregar/',function(data){
            $('#addHor').html(data);
            $('.capa').hide();
            cargar_dataTablehor();
            verh('hdatos');
          });
        });
      }else{
        var n = noty({text: 'Hubo un error al intentar agregar el registro.',type: 'error',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 4000});
        $('.capa').hide();
      }
    },
    error: function(data){
      var n = noty({text: 'Hubo un error al intentar agregar el registro.',type: 'error',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 4000});
      $('.capa').hide();
    },
  });
}
function duplicar_horario(){
  conteo=$('#frHorDup .required').length;
  variable=0;
  for(i=0;i<conteo;i++){
    if($('#frHorDup .required:eq('+i+')').val()==''){
      $('#frHorDup .requerido').fadeIn();
      $('#frHorDup .required:eq('+i+')').css({'border-color' : 'red'})
      variable=variable+1;
    }else{
      $('#frHorDup .required:eq('+i+')').css({'border-color' : '#D6D6D6'})
    }
  }
  if(variable>0){
    var n = noty({text: 'Los campos remarcados en rojo son obligatorios',type: 'error',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 2500});
    return false;
  }
  formData=$('#frHorDup').serialize();
  token=$('#token').val();
  miurl='/horarios.addHorario';
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
        var n = noty({text: 'Se duplico correctamente el registro.',type: 'success',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 4000});
        $.get('/horarios.datos/',function(data){
          $('#datosHo').html(data);
          $('.capa').hide();
          cargar_dataTablehor();
          $('#dupliHor').html('<h3 class="text-color-tertiary">Elige un registor de la tabla para duplicarlo.</h3>');
          verh('hdatos');
        });
      }else{
        var n = noty({text: 'Hubo un error al intentar agregar el registro.',type: 'error',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 4000});
        $('.capa').hide();
      }
    },
    error: function(data){
      var n = noty({text: 'Hubo un error al intentar agregar el registro.',type: 'error',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 4000});
      $('.capa').hide();
    },
  });
}
function show_editHor(){
  horarios_id=$('#horarios_id').val();
  $.get('/horarios.showHor/'+horarios_id,function(data){
    $('#editHor').html(data);
  });
  $.get('/horarios.DupHor/'+horarios_id,function(data){
    $('#dupliHor').html(data);
  });
}
function editar_horario(){
  conteo=$('#frEditHor .required').length;
  variable=0;
  for(i=0;i<conteo;i++){
    if($('#frEditHor .required:eq('+i+')').val()==''){
      $('#frEditHor .requerido').fadeIn();
      $('#frEditHor .required:eq('+i+')').css({'border-color' : 'red'})
      variable=variable+1;
    }else{
      $('#frEditHor .required:eq('+i+')').css({'border-color' : '#D6D6D6'})
    }
  }
  if(variable>0){
    var n = noty({text: 'Los campos remarcados en rojo son obligatorios',type: 'error',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 2500});
    return false;
  }
  formData=$('#frEditHor').serialize();
  token=$('#token').val();
  miurl='/horarios.editHorario';
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
        var n = noty({text: 'Se duplico correctamente el registro.',type: 'success',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 4000});
        $.get('/horarios.datos/',function(data){
          $('#datosHo').html(data);
          $('.capa').hide();
          cargar_dataTablehor();
          $('#dupliHor').html('<h3 class="text-color-tertiary">Elige un registor de la tabla para editar sus datos.</h3>');
          verh('hdatos');
        });
      }else{
        var n = noty({text: 'Hubo un error al intentar agregar el registro.',type: 'error',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 4000});
        $('.capa').hide();
      }
    },
    error: function(data){
      var n = noty({text: 'Hubo un error al intentar agregar el registro.',type: 'error',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 4000});
      $('.capa').hide();
    },
  });
}
function vacantesSel(esteValor,formulario){
  laboratorio_id=esteValor.value;
  $.get('/horarios.vacantes/'+laboratorio_id,function(data){
    $('#'+formulario+' #vacantes').val(data.mensaje);
  });
}
