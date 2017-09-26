<form class="" id="frHorDup" method="post">
  <div class="form-group">
    <label for="laboratiorios_id" class="col-md-2 control-label"><strong>Laboratorio</strong></label>
    <div class="col-md-6">
      <select class="form-control required" name="laboratorios_id" id="laboratorios_id" onchange="vacantesSel(this,'frHorDup')">
        <option value="">Elige un Laboratorio</option>
        @foreach($laboratorios as $laboratorio)
        <option value="{{$laboratorio->id}}" <?php if($laboratorio->id==$horario->laboratorios_id){ ?>selected<?php } ?> >{{$laboratorio->titulo}}</option>
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
        <option value="{{$docente->id}}" <?php if($docente->id==$horario->docentes_id){ ?>selected<?php } ?>>{{$docente->nombre}} {{$docente->apellido}}</option>
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
        <option value="{{$curso->id}}" <?php if($curso->id==$horario->cursos_id){ ?>selected<?php } ?>>{{$curso->tipos->descripcion}} | {{$curso->titulo}}</option>
        @endforeach
      </select>
    </div>
  </div>
  <div class="form-group">
    <label for="modulos_id" class="col-md-2 control-label"><strong>Modulo</strong></label>
    <div class="col-md-6">
      <select class="form-control required" id="modulos_id" name="modulos_id">
        <?php if(count($modulos)==0){ ?>
          <option value="0">ESTE CURSO NO CUENTA CON MODULOS</option>
        <?php }else{ ?>
          <option value="">Elige un modulo del curso seleccionado.</option>
          @foreach($modulos as $modulo)
          <option value="{{$modulo->id}}" <?php if($modulo->id==$horario->modulos_id){ ?>selected<?php } ?>>{{$modulo->titulo}} </option>
          @endforeach
        <?php } ?>
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
      <select class="form-control" id="fecha_fin" name="fecha_fin" required>
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
      <input type=time name="hora_general" id="hora_general" class="form-control" value="{{$horario->hora_general}}">
    </div>
    <label for="hora_general" class="col-md-2 control-label"><strong>Hora General Final</strong></label>
    <div class="col-md-3">
      <input type=time name="hora_generalf" id="hora_generalf" class="form-control" value="{{$horario->hora_generalf}}">
    </div>
  </div>
  <div class="form-group">
    <label for="hora_general" class="col-md-2 control-label"><strong>Vacantes</strong></label>
    <div class="col-md-3">
      <input type=number name="vacantes" id="vacantes" class="form-control" value="{{$horario->vacantes}}">
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
          <td><input type="checkbox"  name="lunes" id="lunes" value="1" onclick="habilitar(this,'lunes')" <?php if($horario->lunes=='1'){ ?> checked <?php  } ?>></td>
          <td><input type="time" name="lunes_hora" id="lunes_hora" class="form-control" <?php if($horario->lunes_hora!='00:00:00'){ ?> value="{{$horario->lunes_hora}}" <?php }else{ ?> readonly<?php } ?>></td>
          <td><input type="time" name="lunes_horaf" id="lunes_horaf" class="form-control" <?php if($horario->lunes_horaf!='00:00:00'){ ?> value="{{$horario->lunes_horaf}}" <?php }else{ ?> readonly<?php } ?>></td>
        </tr>
        <tr>
          <td>Martes</td>
          <td><input type="checkbox"  name="martes" id="martes" value="1" onclick="habilitar(this,'martes')" <?php if($horario->martes=='1'){ ?> checked <?php  } ?>></td>
          <td><input type="time" name="martes_hora" id="martes_hora" class="form-control" <?php if($horario->martes_hora!='00:00:00'){ ?> value="{{$horario->martes_hora}}" <?php }else{ ?> readonly<?php } ?>></td>
          <td><input type="time" name="martes_horaf" id="martes_horaf" class="form-control" <?php if($horario->martes_horaf!='00:00:00'){ ?> value="{{$horario->martes_horaf}}" <?php }else{ ?> readonly<?php } ?>></td>
        </tr>
        <tr>
          <td>Miercoles</td>
          <td><input type="checkbox"  name="miercoles" id="miercoles" value="1" onclick="habilitar(this,'miercoles')" <?php if($horario->miercoles=='1'){ ?> checked <?php  } ?>></td>
          <td><input type="time" name="miercoles_hora" id="miercoles_hora" class="form-control" <?php if($horario->miercoles_hora!='00:00:00'){ ?> value="{{$horario->miercoles_hora}}" <?php }else{ ?> readonly<?php } ?>></td>
          <td><input type="time" name="miercoles_horaf" id="miercoles_horaf" class="form-control" <?php if($horario->miercoles_horaf!='00:00:00'){ ?> value="{{$horario->miercoles_horaf}}" <?php }else{ ?> readonly<?php } ?>></td>
        </tr>
        <tr>
          <td>Jueves</td>
          <td><input type="checkbox"  name="jueves" id="jueves" value="1" onclick="habilitar(this,'jueves')" <?php if($horario->jueves=='1'){ ?> checked <?php  } ?>></td>
          <td><input type="time" name="jueves_hora" id="jueves_hora" class="form-control" <?php if($horario->jueves_hora!='00:00:00'){ ?> value="{{$horario->jueves_hora}}" <?php }else{ ?> readonly<?php } ?>></td>
          <td><input type="time" name="jueves_horaf" id="jueves_horaf" class="form-control" <?php if($horario->jueves_horaf!='00:00:00'){ ?> value="{{$horario->jueves_horaf}}" <?php }else{ ?> readonly<?php } ?>></td>
        </tr>
        <tr>
          <td>Viernes</td>
          <td><input type="checkbox"  name="viernes" id="viernes" value="1" onclick="habilitar(this,'viernes')" <?php if($horario->viernes=='1'){ ?> checked <?php  } ?>></td>
          <td><input type="time" name="viernes_hora" id="viernes_hora" class="form-control" <?php if($horario->viernes_hora!='00:00:00'){ ?> value="{{$horario->viernes_hora}}" <?php }else{ ?> readonly<?php } ?>></td>
          <td><input type="time" name="viernes_horaf" id="viernes_horaf" class="form-control" <?php if($horario->viernes_horaf!='00:00:00'){ ?> value="{{$horario->viernes_horaf}}" <?php }else{ ?> readonly<?php } ?>></td>
        </tr>
        <tr>
          <td>Sabado</td>
          <td><input type="checkbox"  name="sabado" id="sabado" value="1" onclick="habilitar(this,'sabado')" <?php if($horario->sabado=='1'){ ?> checked <?php  } ?>></td>
          <td><input type="time" name="sabado_hora" id="sabado_hora" class="form-control" <?php if($horario->sabado_hora!='00:00:00'){ ?> value="{{$horario->sabado_hora}}" <?php }else{ ?> readonly<?php } ?>></td>
          <td><input type="time" name="sabado_horaf" id="sabado_horaf" class="form-control" <?php if($horario->sabado_horaf!='00:00:00'){ ?> value="{{$horario->sabado_horaf}}" <?php }else{ ?> readonly<?php } ?>></td>
        </tr>
        <tr>
          <td>Domingo</td>
          <td><input type="checkbox"  name="domingo" id="domingo" value="1" onclick="habilitar(this,'domingo')" <?php if($horario->domingo=='1'){ ?> checked <?php  } ?>></td>
          <td><input type="time" name="domingo_hora" id="domingo_hora"  class="form-control" <?php if($horario->domingo_hora!='00:00:00'){ ?> value="{{$horario->domingo_hora}}" <?php }else{ ?> readonly<?php } ?>></td>
          <td><input type="time" name="domingo_horaf" id="domingo_horaf" class="form-control" <?php if($horario->domingo_horaf!='00:00:00'){ ?> value="{{$horario->domingo_horaf}}" <?php }else{ ?> readonly<?php } ?>></td>
        </tr>
      </tbody>
    </table>
  </div>
  <div class="form-group">
    <button type="button" class="btn btn-success" onclick="duplicar_horario()">Duplicar</button>
  </div>
</form>
