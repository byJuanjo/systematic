<h4 class="heading-primary lead tall">CREAR NUEVO USUARIO <i class="fa fa-user-plus" aria-hidden="true"></i></h4>
<form class="" id="formAdd" method="post">
  <div class="form-group">
    <label for="ruta">Tipo de Usuario</label>
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
    <input type="text" class="form-control" name="name" id="name" value="">
  </div>
  <div class="form-group">
    <label for="apellido">Apellidos</label>
    <input type="text" class="form-control" name="apellido" id="apellido" value="">
  </div>
  <div class="form-group">
    <label for="telefono">Telefono</label>
    <input type="text" class="form-control" name="telefono" id="telefono" value="">
  </div>
  <div class="form-group">
    <label for="telefono">Email</label>
    <input type="email" class="form-control" name="email" id="email" value="">
  </div>
  <div class="form-group">
    <label for="celular">Celular</label>
    <input type="text" class="form-control" name="celular" id="celular" value="">
  </div>
  <div class="form-group">
    <label for="fecha_nac">Fecha Nacimiento</label>
    <input type="date" class="form-control" name="fecha_nac" id="fecha_nac" value="">
  </div>
  <div class="form-group">
    <label for="fecha_nac">Sexo</label>
    <select name="sexo" id="sexo" class="form-control required" >
      <option value="Masculino">Masculino</option>
      <option value="Femenino">Femenino</option>
    </select>
  </div>
</form>
<button class="btn btn-success btn-block" onclick="crearUser()"><b>CREAR USUARIO <i class="fa fa-floppy-o" aria-hidden="true"></i></b></button>
<br>
<section class="call-to-action featured featured-primary mb-xll" style="padding:15px">
  <input type="hidden" readonly name="codigo" id="codigo" value="">
  <h4 class="heading-primary lead tall">LISTADO DE USUARIOS <i class="fa fa-users" aria-hidden="true"></i></h4>
  <button type="button" class="btn btn-warning" name="button" onclick="editar_user()"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> EDITAR</button>
  <button type="button" class="btn btn-danger"  name="button" onclick="activar_user('DESACTIVAR')"><i class="fa fa-ban" aria-hidden="true"></i> DESACTIVAR</button>
  <button type="button" class="btn btn-success" name="button" onclick="activar_user('ACTIVAR')"><i class="fa fa-check" aria-hidden="true"></i> ACTIVAR</button>
  <br><br>
  <div class="table table-responsive">
    <table class="table table-responsive" id="tbUsers">
      <thead>
        <tr>
          <th>Id</th>
          <th>Nombres</th>
          <th>Apellidos</th>
          <th>Email</th>
          <th>Tipo de Usuario</th>
          <th>Estado</th>
        </tr>
      </thead>
      <tbody>
        @foreach($userAdmin as $admin)
        <tr>
          <td>{{$admin->id}}</td>
          <td>{{$admin->name}}</td>
          <td>{{$admin->apellido}}</td>
          <td>{{$admin->email}}</td>
          <td>{{$admin->name_tipo}}</td>
          <td>{{$admin->estado}}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</section>
<div class="capa">
  <div id="loader"></div>
</div>
