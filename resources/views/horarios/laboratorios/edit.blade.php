<form class="" id="frLabEdit" method="post">
  <input type="hidden" id="token" name="_token" readonly="true" value="{{csrf_token()}}">
  <div class="form-group">
    <label for="" class="col-md-2 control-label"><strong>Nombre</strong></label>
    <div class="col-md-6">
      <input type="hidden" readonly name="id" id="id" size="50" class="form-control required" value="{{$laboratorio->id}}" />
      <input type="text" name="titulo" id="titulo" size="50" class="form-control required" value="{{$laboratorio->titulo}}" />
    </div>
  </div>
  <div class="form-group">
    <label for="" class="col-md-2 control-label"><strong>Descripción</strong></label>
    <div class="col-md-7">
      <input type="text" name="descripcion" id="descripcion" size="50" class="form-control " value="{{$laboratorio->descripcion}}" />
    </div>
  </div>
  <div class="form-group">
    <label for="" class="col-md-2 control-label"><strong>Ubicación</strong></label>
    <div class="col-md-5">
      <input type="text" name="ubicacion" id="ubicacion" size="40" class="form-control " value="{{$laboratorio->ubicacion}}" />
    </div>
  </div>
  <div class="form-group">
    <label for="" class="col-md-2 control-label"><strong>Capacidad</strong></label>
    <div class="col-md-4">
      <input type="number" name="capacidad" id="capacidad" class="form-control required" value="{{$laboratorio->capacidad}}" />
    </div>
  </div>
  <div class="form-group">
    <button type="button" class="btn btn-success" onclick="actualizar_laboratorio()">Actualizar</button>
    &nbsp;&nbsp;
    <button type="button" class="btn btn-warning" onclick="$('#frLabEdit')[0].reset();">Restaurar</button>
  </div>
</form>
