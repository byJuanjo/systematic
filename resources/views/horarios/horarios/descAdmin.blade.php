<div class="row">
  <div class="col-md-4">
    <div class="box well">
      <div class="box-body box-profile">
        <?php if($user->ruta==''){ ?>
          <img class="profile-user-img img-responsive img-circle" src="img/profile/default.jpg" alt="User profile picture">
        <?php }else{ ?>
          <img class="profile-user-img img-responsive img-circle" src="img/profile/{{$user->ruta}}" alt="User profile picture">
        <?php } ?>

        <h3 class="profile-username text-center">{{$user->name}} {{$user->apellido}}</h3>
        <p class="text-muted text-center">{{$user->name_tipo}}</p>
        <ul class="list-group list-group-unbordered">
          <li class="list-group-item">
            <b>DNI</b> <a class="pull-right">{{$user->documento}}</a>
          </li>
          <li class="list-group-item">
            <b>Correo</b> <a class="pull-right">{{$user->email}}</a>
          </li>
          <li class="list-group-item">
            <b>Telefono</b> <a class="pull-right">{{$user->telefono}}</a>
          </li>
          <li class="list-group-item">
            <b>Celular</b> <a class="pull-right">{{$user->celular}}</a>
          </li>
        </ul>
        <button class="btn btn-primary btn-block" onclick="mostrarData()"><b>Actualizar Informción <i class="fa fa-chevron-right" aria-hidden="true"></i></b></button>
      </div>
    </div>
  </div>
  <div class="col-md-8" style="display:none" id="dataProfile">
    <div class="box well">
      <button type="button" class="close" style="color:red;" onclick="ocultarData()" ><span aria-hidden="true">&times;</span></button>
      <div class="box-body box-profile">
        <form class="" id="formProfile" method="post">
          <div class="form-group">
            <label for="ruta">Imagen de Perfil</label>
            <input type="file" class="form-control" name="ruta" id="ruta">
            <input type="hidden" readonly="true" name="id" id="id" value="{{$user->id}}">
            <input type="hidden" id="token" name="_token" readonly="true" value="{{csrf_token()}}">
          </div>
          <div class="form-group">
            <label for="name">DNI</label>
            <input type="text" class="form-control required" name="documento" id="documento" value="{{$user->documento}}">
          </div>
          <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" class="form-control required" name="name" id="name" value="{{$user->name}}">
          </div>
          <div class="form-group">
            <label for="apellido">Apellidos</label>
            <input type="text" class="form-control required" name="apellido" id="apellido" value="{{$user->apellido}}">
          </div>
          <div class="form-group">
            <label for="telefono">Telefono</label>
            <input type="text" class="form-control" name="telefono" id="telefono" value="{{$user->telefono}}">
          </div>
          <div class="form-group">
            <label for="celular">Celular</label>
            <input type="text" class="form-control" name="celular" id="celular" value="{{$user->celular}}">
          </div>
          <div class="form-group">
            <label for="fecha_nac">Fecha Nacimiento</label>
            <input type="date" class="form-control required" name="fecha_nac" id="fecha_nac" value="{{$user->fecha_nac}}">
          </div>
          <div class="form-group">
            <label for="fecha_nac">Sexo</label>
            <select name="sexo" id="sexo" class="form-control required" >
              <option value="Masculino" <?php if($user->sexo=='Masculino'){ ?> checked <?php } ?>>Masculino</option>
              <option value="Femenino" <?php if($user->sexo=='Femenino'){ ?> checked <?php } ?>>Femenino</option>
            </select>
          </div>
        </form>
        <a href="#" class="btn btn-success btn-block" onclick="guardarDataUser()"><b>Guardar Datos <i class="fa fa-floppy-o" aria-hidden="true"></i></b></a>
      </div>
      <div class="capa">
        <div id="loader"></div>
      </div>
    </div>
  </div>
</div>
