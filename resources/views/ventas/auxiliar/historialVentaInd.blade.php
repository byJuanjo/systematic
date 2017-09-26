<div class="row">
  <div class="col-lg-2">
    <label for="">Tipo de Venta</label>
    <input type="hidden" readonly name="venta_historial_id" id="venta_historial_id" value="{{$venta->id}}">
    <p><b>{{$venta->tipoVenta}}</b></p>
  </div>
  <div class="col-lg-5">
    <label for="">Usuario</label>
    <p>{{$venta->user->razon_social}}</p>
  </div>
  <div class="col-lg-5">
    <label for="">Curso</label>
    <p>{{$venta->cursos->titulo}}</p>
  </div>
</div>
<div class="row">
  <div class="col-lg-4">
    <label for="">Precio</label>
    <p>S/. {{$venta->precio}}</p>
  </div>
</div>
<div class="row">
  <div class="featured-boxes featured-boxes-style-8">
    <div class="col-md-12">
      <div class="featured-box featured-box-tertiary featured-box-text-left" style="margin-bottom:0px;margin-top:2px;">
        <div class="box-content" style="padding: 10px 30px 10px 30px;">
          <div class="row">
            <div class="col-md-12">
              <h4>Modulos Comprados</h4>
              <table class="table table-responsive">
                <thead>
                  <tr>
                    <th>Modulo</th>
                    <th>Horarios</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($venta->modulosVentas as $modulos)

                    <tr>
                      <td>
                        {{$modulos->modulos->titulo}}
                      </td>
                      <td>
                        <form class="" id="frm_moduloventa_{{$modulos->id}}">
                          <input type="hidden" id="token" name="_token" readonly="true" value="{{csrf_token()}}">
                          <input type="hidden" name="modulosVentas_id" id="modulosVentas_id" value="{{$modulos->id}}">
                          <select class="form-control" name="horario_venta" id="horario_venta">
                            <option value="">Elige un Horario</option>
                            @foreach($horarios as $horario)
                            <?php if($horario->modulos_id==$modulos->modulos->id){ ?>
                              <option value="{{$horario->id}}" <?php if($modulos->horarios_id==$horario->id){ ?> selected <?php } ?>>
                                {{$horario->fecha_inicio}} |
                                {{$horario->fecha_fin}} |
                                  <?php if($horario->lunes=='1'){ ?>
                                    Lunes {{$horario->lunes_hora}} - {{$horario->lunes_horaf}} |
                                  <?php } ?>
                                  <?php if($horario->martes=='1'){ ?>
                                    Martes {{$horario->martes_hora}} - {{$horario->martes_horaf}} |
                                  <?php } ?>
                                  <?php if($horario->miercoles=='1'){ ?>
                                    Miercoles {{$horario->miercoles_hora}} - {{$horario->miercoles_horaf}} |
                                  <?php } ?>
                                  <?php if($horario->jueves=='1'){ ?>
                                    Jueves {{$horario->jueves_hora}} - {{$horario->jueves_horaf}} |
                                  <?php } ?>
                                  <?php if($horario->viernes=='1'){ ?>
                                    Viernes {{$horario->viernes_hora}} - {{$horario->viernes_horaf}} |
                                  <?php } ?>
                                  <?php if($horario->sabado=='1'){ ?>
                                    Sabado {{$horario->sabado_hora}} - {{$horario->sabado_horaf}} |
                                  <?php } ?>
                                  <?php if($horario->domingo=='1'){ ?>
                                    Domingo {{$horario->domingo_hora}} - {{$horario->domingo_horaf}}
                                  <?php } ?>
                              </option>
                            <?php }else{ ?>
                              <option value="">No hay Horarios disponibles de momento</option>
                            <?php } ?>
                            @endforeach
                          </select>
                        </form>
                      </td>
                      <td>
                        <button type="button" name="button" class="btn btn-success" onclick="asignarHorario('#frm_moduloventa_{{$modulos->id}}')" >Asignar Horario <i class="fa fa-clock-o" aria-hidden="true"></i></button>
                      </td>
                    </tr>

                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<br>
<div class="row">
  <div class="featured-boxes featured-boxes-style-8">
    <div class="col-md-12">
      <div class="featured-box featured-box-tertiary featured-box-text-left" style="margin-bottom:0px;margin-top:2px;">
        <div class="box-content" style="padding: 10px 30px 10px 30px;">
          <div class="row">
            <div class="col-md-12">
              <h4>Pagos</h4>
              <table class="table table-responsive">
                <thead>
                  <tr>
                    <th>Precio</th>
                    <th>A CUENTA</th>
                    <th>SALDO</th>
                    <th>FECHA PAGO</th>
                    <th>TIPO DOCUMENTO</th>
                    <th>NUM DOCUMENTO</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $precio=$venta->precio; ?>
                  @foreach($venta->pagos as $pagos)
                  <tr>
                    <td>S/. {{$precio}}</td>
                    <td>S/. {{$pagos->pago}}</td>
                    <td>S/. {{$pagos->saldo}}</td>
                    <td><center>{{$pagos->fecha}}</center></td>
                    <td><center>{{$pagos->tipo_doc}}</center></td>
                    <td><center>{{$pagos->num_documento}}</center></td>
                  </tr>
                  <?php
                    $precio=$precio-$pagos->pago;
                    $precio= number_format($precio, 2, '.', ' ');
                  ?>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <button type="button" class="btn btn-success" name="button" onclick="realizar_pago()" >Realizar Pago <i class="fa fa-money" aria-hidden="true"></i></button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
