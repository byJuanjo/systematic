<div class="row">
  <div class="col-md-6">
    <div class="form-group">
      <label for="name">Nombre</label>
      <input type="hidden" class="form-control required" name="user_id" id="user_id" value="{{$user[0]->id}}">
      <input type="text" class="form-control" name="name" id="name" value="{{$user[0]->name}}">
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group">
      <label for="apellido">Apellido</label>
      <input type="text" class="form-control" name="apellido" id="apellido" value="{{$user[0]->apellido}}">
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-6">
    <div class="form-group">
      <label for="email">Correo</label>
      <input type="text" class="form-control" name="email" id="email" value="{{$user[0]->email}}" onblur="validar_correo()">
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group">
      <label for="celular">Celular</label>
      <input type="text" class="form-control" name="celular" id="celular" value="{{$user[0]->celular}}">
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
    <button class="btn btn-success" type="button" name="button" onclick="actualizar_user()">Actualizar Informacion <i class="fa fa-refresh" aria-hidden="true"></i></button>
  </div>
</div>
