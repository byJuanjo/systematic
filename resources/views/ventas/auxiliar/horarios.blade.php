<div class="featured-box featured-box-tertiary featured-box-text-left" >
  <div class="box-content" style="padding: 10px 30px 10px 30px;">
    <div class="row">
      <div class="col-md-12">
        <h4>Horarios</h4>
      </div>
    </div>
    <div class="row">
      <table class="table table-responsive" style="font-size:11px">
        <thead>
          <tr>
            <th style="width:120px">Modulo</th>
            <th style="width:50px">Vacantes</th>
            <th style="width:90px">Inicio</th>
            <th style="width:200px">Horario</th>
          </tr>
        </thead>
        <tbody>
          <?php if(count($horarios)==0){ ?>
            <tr>
              <td colspan="3"><h4><center>No hay horarios disponibles de momento.</center></h4></td>
            </tr>
          <?php } ?>
          @foreach($horarios as $horario)
          <tr>
            <td>{{$horario->modulos->titulo}}</td>
            <td><center>{{$horario->vacantes}}</center></td>
            <td>{{$horario->fecha_inicio}}</td>
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
    </div>
  </div>
</div>
