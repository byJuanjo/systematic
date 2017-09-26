<form class="" id="frHor" method="post">
  <div class="form-group">
    <label for="laboratiorios_id" class="col-md-2 control-label"><strong>Laboratorio</strong></label>
    <div class="col-md-6">
      <select class="form-control required" name="laboratorios_id" id="laboratorios_id" onchange="vacantesSel(this,'frHor')">
        <option value="">Elige un Laboratorio</option>
        @foreach($laboratorios as $laboratorio)
        <option value="{{$laboratorio->id}}">{{$laboratorio->titulo}}</option>
        @endforeach
      </select>
    </div>
  </div>
  <div class="form-group">
    <label for="docentes_id" class="col-md-2 control-label"><strong>Docente</strong></label>
    <div class="col-md-6">
      <select class="form-control required" name="docentes_id" id="docentes_id">
        <option value="">Elige un Laboratorio</option>
        @foreach($docentes as $docente)
        <option value="{{$docente->id}}">{{$docente->nombre}} {{$docente->apellido}}</option>
        @endforeach
      </select>
    </div>
  </div>
  <div class="form-group">
    <label for="cursos_id" class="col-md-2 control-label"><strong>Curso</strong></label>
    <div class="col-md-6">
      <select class="form-control required" name="cursos_id" id="cursos_id" onchange="buscarModulo(this.value)">
        <option value="">Elige un Curso</option>
        @foreach($cursos as $curso)
        <option value="{{$curso->id}}">{{$curso->tipos->descripcion}} | {{$curso->titulo}}</option>
        @endforeach
      </select>
    </div>
  </div>
  <div class="form-group">
    <label for="modulos_id" class="col-md-2 control-label"><strong>Modulo</strong></label>
    <div class="col-md-6">
      <select class="form-control required" id="modulos_id" name="modulos_id">
        <option value="">PRIMERO ELIGE UN CURSO ⬆ ⬆ ⬆</option>
      </select>
    </div>
  </div>
  <div class="form-group">
    <label for="fecha_inicio" class="col-md-2 control-label"><strong>Fecha Inicio</strong></label>
    <div class="col-md-3">
      <input type=date name="fecha_inicio" id="fecha_inicio" class="form-control required" value="">
    </div>
    <label for="fecha_inicio" class="col-md-2 control-label"><strong>Duración</strong></label>
    <div class="col-md-3">
      <select class="form-control required" id="fecha_fin" name="fecha_fin">
        <option value="4 SEMANAS">4 SEMANAS</option>
        <option value="6 SEMANAS">6 SEMANAS</option>
      </select>
    </div>
  </div>
  <div class="form-group">
    <label for="fecha_inicio" class="col-md-2 control-label"><strong>Fecha Publicacion</strong></label>
    <div class="col-md-3">
      <input type=date name="fecha_muestra" id="fecha_muestra" class="form-control required" value="">
    </div>
    <label for="fecha_inicio" class="col-md-2 control-label"><strong>Fecha Fin Pub.</strong></label>
    <div class="col-md-3">
      <input type=date name="fecha_finmuestra" id="fecha_finmuestra" class="form-control required" value="">
    </div>
  </div>
  <div class="form-group">
    <label for="hora_general" class="col-md-2 control-label"><strong>Hora General</strong></label>
    <div class="col-md-3">
      <input type=time name="hora_general" id="hora_general" class="form-control" value="">
    </div>
    <label for="hora_general" class="col-md-2 control-label"><strong>Hora General Final</strong></label>
    <div class="col-md-3">
      <input type=time name="hora_generalf" id="hora_generalf" class="form-control" value="">
    </div>
  </div>
  <div class="form-group">
    <label for="hora_general" class="col-md-2 control-label"><strong>Vacantes</strong></label>
    <div class="col-md-3">
      <input type=number name="vacantes" id="vacantes" class="form-control" value="">
    </div>
  </div>
  <div class="box well">
    <table class="table">
      <thead>
        <th>Dia</th>
        <th>Activo</th>
        <th>Hora Inicio</th>
        <th>Hora Fin</th>
      </thead>
      <tbody>
        <tr>
          <td>Lunes</td>
          <td><input type="checkbox"  name="lunes" id="lunes" value="1" onclick="habilitar(this,'lunes')"></td>
          <td><input type="time" name="lunes_hora" id="lunes_hora" readonly class="form-control"></td>
          <td><input type="time" name="lunes_horaf" id="lunes_horaf" readonly class="form-control"></td>
        </tr>
        <tr>
          <td>Martes</td>
          <td><input type="checkbox"  name="martes" id="martes" value="1" onclick="habilitar(this,'martes')"></td>
          <td><input type="time" name="martes_hora" id="martes_hora" readonly class="form-control"></td>
          <td><input type="time" name="martes_horaf" id="martes_horaf" readonly class="form-control"></td>
        </tr>
        <tr>
          <td>Miercoles</td>
          <td><input type="checkbox"  name="miercoles" id="miercoles" value="1" onclick="habilitar(this,'miercoles')"></td>
          <td><input type="time" name="miercoles_hora" id="miercoles_hora" readonly class="form-control"></td>
          <td><input type="time" name="miercoles_horaf" id="miercoles_horaf" readonly class="form-control"></td>
        </tr>
        <tr>
          <td>Jueves</td>
          <td><input type="checkbox"  name="jueves" id="jueves" value="1" onclick="habilitar(this,'jueves')"></td>
          <td><input type="time" name="jueves_hora" id="jueves_hora" readonly class="form-control"></td>
          <td><input type="time" name="jueves_horaf" id="jueves_horaf" readonly class="form-control"></td>
        </tr>
        <tr>
          <td>Viernes</td>
          <td><input type="checkbox"  name="viernes" id="viernes" value="1" onclick="habilitar(this,'viernes')"></td>
          <td><input type="time" name="viernes_hora" id="viernes_hora" readonly class="form-control"></td>
          <td><input type="time" name="viernes_horaf" id="viernes_horaf" readonly class="form-control"></td>
        </tr>
        <tr>
          <td>Sabado</td>
          <td><input type="checkbox"  name="sabado" id="sabado" value="1" onclick="habilitar(this,'sabado')"></td>
          <td><input type="time" name="sabado_hora" id="sabado_hora" readonly class="form-control"></td>
          <td><input type="time" name="sabado_horaf" id="sabado_horaf" readonly class="form-control"></td>
        </tr>
        <tr>
          <td>Domingo</td>
          <td><input type="checkbox"  name="domingo" id="domingo" value="1" onclick="habilitar(this,'domingo')"></td>
          <td><input type="time" name="domingo_hora" id="domingo_hora" readonly class="form-control"></td>
          <td><input type="time" name="domingo_horaf" id="domingo_horaf" readonly class="form-control"></td>
        </tr>
      </tbody>
    </table>
  </div>
  <div class="form-group">
    <button type="button" class="btn btn-success" onclick="agregar_horario()">Agregar</button>
  </div>
</form>
