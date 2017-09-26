<div class="row">
  @if(Auth::guest())
  <div class="col-md-9">
      <textarea name="name" rows="3" cols="80" class="form-control" onfocus="loguear_usuario()"></textarea>
  </div>
  <div class="col-md-3">
    <br>
      <button type="button" name="button" class="btn btn-primary btn-lg" onclick="loguear_usuario()">Consultar</button>
  </div>
  @else
  <div class="col-md-9">
    <form class="" id="frm_comentario" method="post">
      <input type="hidden" id="token" name="_token" readonly="true" value="{{csrf_token()}}">
      <input type="hidden" readonly="true" name="cursos_id" id="cursos_id" value="{{$curso->id}}">
      <textarea name="descripcion_com" id="descripcion_com" rows="3" cols="80"  class="form-control"></textarea>
    </form>
  </div>
  <div class="col-md-3">
    <br>
      <button type="button" name="button" class="btn btn-primary btn-lg" onclick="enviar_comentario()">Consultar</button>
  </div>
  @endif
</div>
<hr>
<div id="list_comentarios">
  @include('cursos.listComentarios')
</div>
