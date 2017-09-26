<form class="" id="formEdit" method="post">
  <div class="form-group">
    <label for="ruta">Tipo de Usuario</label>
    <input type="hidden" class="form-control" name="id" id="id" value="{{$userId->id}}">
    <input type="hidden" id="token" name="_token" readonly="true" value="{{csrf_token()}}">
    <select class="form-control" name="name_tipo" id="name_tipo">
      <option value="ADMINISTRADOR">ADMINISTRADOR</option>
      <option value="ASESOR DE VENTAS">ASESOR DE VENTAS</option>
    </select>
  </div>
  <div class="form-group">
    <label for="ruta">Imagen de Perfil</label>
    <input type="file" class="form-control" name="ruta" id="ruta">
  </div>
  <div class="form-group">
    <label for="name">Nombre</label>
    <input type="text" class="form-control required" name="name" id="name" value="{{$userId->name}}">
  </div>
  <div class="form-group">
    <label for="apellido">Apellidos</label>
    <input type="text" class="form-control required" name="apellido" id="apellido" value="{{$userId->apellido}}">
  </div>
  <div class="form-group">
    <label for="telefono">Telefono</label>
    <input type="text" class="form-control required" name="telefono" id="telefono" value="{{$userId->telefono}}">
  </div>
  <div class="form-group">
    <label for="telefono">Email</label>
    <input type="email" class="form-control required" name="email" id="email" value="{{$userId->email}}">
  </div>
  <div class="form-group">
    <label for="celular">Celular</label>
    <input type="text" class="form-control " name="celular" id="celular" value="{{$userId->celular}}">
  </div>
  <div class="form-group">
    <label for="fecha_nac">Fecha Nacimiento</label>
    <input type="date" class="form-control required" name="fecha_nac" id="fecha_nac" value="{{$userId->fecha_nac}}">
  </div>
  <div class="form-group">
    <label for="fecha_nac">Sexo</label>
    <select name="sexo" id="sexo" class="form-control required" >
      <option <?php if($userId->sexo=="Masculino"){ ?> checked <?php } ?> value="Masculino">Masculino</option>
      <option <?php if($userId->sexo=="Femenino"){ ?> checked <?php } ?> value="Femenino">Femenino</option>
    </select>
  </div>
</form>
<button class="btn btn-success btn-block" onclick="updateUser()"><b>Actualizar Informacion <i class="fa fa-refresh" aria-hidden="true"></i></b></button>
