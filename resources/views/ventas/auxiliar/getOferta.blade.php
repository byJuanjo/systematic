<div class="featured-boxes featured-boxes-style-8">
  <div class="row">
    @foreach($ofertas as $oferta)
    <div class="col-md-12">
      <div class="featured-box featured-box-tertiary featured-box-text-left">
        <div class="box-content">
          <div class="row">
            <div class="col-md-9">
              <h2>Oferta</h2>
            </div>
            <div class="col-md-3">
            <i class="fa fa-ticket" style="font-size:50px;color:#2BAAB1" aria-hidden="true"></i>
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
                    <td style="text-align:right"><b>Paga</b></td><td style="text-align:right"><h2>S/. <span class="precio_result"><?php $paga=$precio-$valorDescuento; echo number_format($paga,2); ?></span></h2></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>
