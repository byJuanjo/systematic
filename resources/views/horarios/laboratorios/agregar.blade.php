<form class="" id="frLab" method="post">
  <input type="hidden" id="token" name="_token" readonly="true" value="{{csrf_token()}}">
  <div class="form-group">
    <label for="titulo" class="col-md-2 control-label"><strong>Nombre</strong></label>
    <div class="col-md-6">
      <input type="text" name="titulo" id="titulo" size="50" class="form-control required" value="" />
    </div>
  </div>
  <div class="form-group">
    <label for="descripcion" class="col-md-2 control-label"><strong>Descripción</strong></label>
    <div class="col-md-7">
      <input type="text" name="descripcion" id="descripcion" size="50" class="form-control " value="" />
    </div>
  </div>
  <div class="form-group">
    <label for="ubicacion" class="col-md-2 control-label"><strong>Ubicación</strong></label>
    <div class="col-md-5">
      <input type="text" name="ubicacion" id="ubicacion" size="40" class="form-control " value="" />
    </div>
  </div>
  <div class="form-group">
    <label for="capacidad" class="col-md-2 control-label"><strong>Capacidad</strong></label>
    <div class="col-md-4">
      <input type="number" name="capacidad" id="capacidad" class="form-control required" value="" />
    </div>
  </div>
  <div class="form-group">
    <button type="button" class="btn btn-success" onclick="agregar_laboratorio()">Agregar</button>
    &nbsp;&nbsp;
    <button type="button" class="btn btn-warning" onclick="$('#frLab')[0].reset();">Limpiar</button>
  </div>
</form>
