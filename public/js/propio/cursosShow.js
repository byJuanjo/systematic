function loguear_usuario(){
  $('#iniciarSession').modal('show');
}
function enviar_comentario(){
  descripcion=$('#descripcion_com').val();
  cursos_id=$('#cursos_id').val();
  if(descripcion!=''){
    var token=$('#token').val();
    formData=new FormData($("#frm_comentario")[0]);
    $.ajax({
      url: '/enviarComentario',
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
          var n = noty({text: 'Gracias por la consulta, en breve sera respondida.',type: 'success',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 4000});
          $.get('/listComentarios/'+cursos_id,function(data){
            $('#list_comentarios').html(data);
            $('#descripcion_com').val('');
          });
        }else if(data.mensaje!='error'){
          $('.capa').hide();
          var n = noty({text: 'Hubo un error al intentar dejar la consulta.',type: 'error',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 4000});
        }
      },
      error: function(data){
        $('.capa').hide();
        var n = noty({text: 'Hubo un error al intentar dejar la consulta.',type: 'error',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 4000});
      },
    });
  }else{
    var n = noty({text: 'Primero escribe tu consulta para poder enviarla.',type: 'warning',dismissQueue: true,layout: 'topRight',theme: 'defaultTheme',timeout: 4000});
  }
}
