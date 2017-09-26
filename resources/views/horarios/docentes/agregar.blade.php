<form class="" id="frDoc" method="post">
  <input type="hidden" id="token" name="_token" readonly="true" value="{{csrf_token()}}">
  <div class="form-group">
    <label for="nombre" class="col-md-2 control-label"><strong>Nombre</strong></label>
    <div class="col-md-6">
      <input type="text" name="nombre" id="nombre" size="50" class="form-control required" value="" />
    </div>
  </div>
  <div class="form-group">
    <label for="apellido" class="col-md-2 control-label"><strong>Apellidos</strong></label>
    <div class="col-md-7">
      <input type="text" name="apellido" id="apellido" size="50" class="form-control required" value="" />
    </div>
  </div>
  <div class="form-group">
    <button type="button" class="btn btn-success" onclick="agregar_docente()">Agregar</button>
    &nbsp;&nbsp;
    <button type="button" class="btn btn-warning" onclick="$('#frDoc')[0].reset();">Limpiar</button>
  </div>
</form>
