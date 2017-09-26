<form class="" id="frDocEdit" method="post">
  <input type="hidden" id="token" name="_token" readonly="true" value="{{csrf_token()}}">
  <div class="form-group">
    <label for="" class="col-md-2 control-label"><strong>Nombre</strong></label>
    <div class="col-md-6">
      <input type="hidden" readonly name="id" id="id" size="50" class="form-control required" value="{{$docente->id}}" />
      <input type="text" name="nombre" id="nombre" size="50" class="form-control required" value="{{$docente->nombre}}" />
    </div>
  </div>
  <div class="form-group">
    <label for="" class="col-md-2 control-label"><strong>Descripción</strong></label>
    <div class="col-md-7">
      <input type="text" name="apellido" id="apellido" size="50" class="form-control " value="{{$docente->apellido}}" />
    </div>
  </div>
  <div class="form-group">
    <button type="button" class="btn btn-success" onclick="actualizar_docente()">Actualizar</button>
    &nbsp;&nbsp;
    <button type="button" class="btn btn-warning" onclick="$('#frDocEdit')[0].reset();">Restaurar</button>
  </div>
</form>
