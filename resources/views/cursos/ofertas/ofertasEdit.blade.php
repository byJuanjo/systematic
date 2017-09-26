<?php if(count($modulos)>2){ ?>
  <h4 class="mb-md text-uppercase">Definir <strong>Ofertas</strong> <button type="button" name="button" class="btn btn-success" onclick="agregar_oferta({{$curso_id}})" >AGREGAR OFERTAS <i class="fa fa-plus-circle" aria-hidden="true"></i></button></h4>
  <?php if(count($ofertas)==0){ ?>
    <p>Aun no hay Ofertas creadas.</p>
  <?php }else{ ?>
    <?php $numOferta=1; ?>
    <div class="featured-boxes featured-boxes-style-8">
      <div class="row">
        @foreach($ofertas as $oferta)
        <div class="col-md-4">
          <div class="featured-box featured-box-tertiary featured-box-text-left">
            <div class="box-content">
              <div class="row">
                <div class="col-md-9">
                  <h2>Oferta {{$numOferta}}</h2>
                </div>
                <div class="col-md-3">
                  <div class="align-right">
                    <i class="icon-featured fa fa-ticket" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <h4>Modulos</h4>
                  <table class="table table-responsive">
                    <thead>
                      <tr>
                        <th>Modulo</th>
                        <th>Costo</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $precio=0; ?>
                      @foreach($oferta->modulos as $modulos)
                      <tr>
                        <td><span>{{$modulos->titulo}}</span></td><td style="text-align:right">S/. {{$modulos->precio}}</td>
                      </tr>
                      <?php $precio+=$modulos->precio; ?>
                      @endforeach
                      <?php if(count($oferta->modulos)==1){ ?>
                        <tr><td colspan="2">&nbsp;</td></tr>
                        <tr><td colspan="2">&nbsp;</td></tr>
                      <?php }else if(count($oferta->modulos)==2){ ?>
                        <tr><td colspan="2">&nbsp;</td></tr>
                      <?php } ?>
                      <tr>
                        <td style="text-align:right"><b>Total</b></td><td style="text-align:right">S/. <?php echo number_format($precio, 2); ?></td>
                      </tr>
                      <tr>
                        <td style="text-align:right"><b>Descuento</b></td><td style="text-align:right">{{$oferta->porcentaje}} %</td>
                      </tr>
                      <tr>
                        <td style="text-align:right"><b>Valor Descuento</b></td><td style="text-align:right">S/. <?php $porcentaje=$oferta->porcentaje; $valorDescuento=($precio*$porcentaje)/100; echo number_format($valorDescuento,2); ?></td>
                      </tr>
                      <tr>
                        <td style="text-align:right"><b>Paga</b></td><td style="text-align:right"><h2>S/. <?php $paga=$precio-$valorDescuento; echo number_format($paga,2); ?></h2></td>
                      </tr>
                    </tbody>
                  </table>
                  <p>Visible: <b>{{$oferta->activo}}</b></p>
                  <button class="btn btn-warning mr-xs mb-lg" type="button" onclick="editarOferta({{$oferta->id}})">Editar <i class="fa fa-pencil" aria-hidden="true"></i></button>
                  &nbsp;
                  <button class="btn btn-danger mr-xs mb-lg" type="button"  onclick="eliminarOferta({{$oferta->id}})">Eliminar <i class="fa fa-trash-o" aria-hidden="true"></i></button>
                  &nbsp;
                  <script type="text/javascript">
                    new Clipboard('#copiador');
                  </script>
                  <div class="input-group">
                   <input type="text" class="form-control" name="oferta_id{{$oferta->id}}" id="oferta_id{{$oferta->id}}" value="http://localhost:/ofertas/{{$oferta->id}}">
                   <span class="input-group-btn">

                     <button class="btn btn-mutted" id="copiador" type="button"  data-clipboard-target="#oferta_id{{$oferta->id}}" ><i class="fa fa-clipboard" aria-hidden="true"></i></button>

                   </span>
                 </div>

                </div>
              </div>
            </div>
          </div>
        </div>
        <?php $numOferta+=1; ?>
        @endforeach
      </div>
    </div>
  <?php } ?>
<?php } ?>
