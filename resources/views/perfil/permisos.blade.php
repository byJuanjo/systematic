<h4 class="heading-primary lead tall">PERMISOS DE USUARIOS <i class="fa fa-hand-paper-o" aria-hidden="true"></i></h4>
<div class="form-group">
  <label for="user_id">Elige un Usuario</label>
  <select class="form-control" name="user_id_list" id="user_id_list" onchange="buscar_permisos(this)">
    <option value="">Elige un Usuario</option>
    @foreach($userAdmin as $admin)
    <option value="{{$admin->id}}">{{$admin->name}} {{$admin->apellido}}</option>
    @endforeach
  </select>
</div>

<div id="listPermisos">

</div>
