<section class="call-to-action featured featured-primary mb-xll" style="padding:15px">
  <input type="hidden" name="horarios_id" id="horarios_id" value="" readoly="true">
  <table class="table table-responsive" id="tbHorarios">
    <thead>
      <tr>
        <th style="width:10px">Id</th>
        <th>Laboratorio</th>
        <th>Docente</th>
        <th>Curso</th>
        <th>Modulo</th>
        <th>Inicio</th>
        <th>Duracion</th>
        <th style="width:200px">Horario</th>
      </tr>
    </thead>
    <tbody>
      @foreach($horarios as $horario)
      <tr style="font-size:10px">
        <td style="width:10px">{{$horario->id}}</td>
        <td>{{$horario->laboratorios->titulo}}</td>
        <td>{{$horario->docentes->nombre}} {{$horario->docentes->apellido}}</td>
        <td style="width:150px">{{$horario->cursos->titulo}}</td>
        <td style="width:150px">{{$horario->modulos->titulo}}</td>
        <td>{{$horario->fecha_inicio}}</td>
        <td>{{$horario->fecha_fin}}</td>
        <td  style="width:200px">
          <?php if($horario->lunes=='1'){ ?>
            Lunes {{$horario->lunes_hora}} - {{$horario->lunes_horaf}} <br>
          <?php } ?>
          <?php if($horario->martes=='1'){ ?>
            Martes {{$horario->martes_hora}} - {{$horario->martes_horaf}} <br>
          <?php } ?>
          <?php if($horario->miercoles=='1'){ ?>
            Miercoles {{$horario->miercoles_hora}} - {{$horario->miercoles_horaf}} <br>
          <?php } ?>
          <?php if($horario->jueves=='1'){ ?>
            Jueves {{$horario->jueves_hora}} - {{$horario->jueves_horaf}} <br>
          <?php } ?>
          <?php if($horario->viernes=='1'){ ?>
            Viernes {{$horario->viernes_hora}} - {{$horario->viernes_horaf}} <br>
          <?php } ?>
          <?php if($horario->sabado=='1'){ ?>
            Sabado {{$horario->sabado_hora}} - {{$horario->sabado_horaf}} <br>
          <?php } ?>
          <?php if($horario->domingo=='1'){ ?>
            Domingo {{$horario->domingo_hora}} - {{$horario->domingo_horaf}} <br>
          <?php } ?>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</section>
