
<!DOCTYPE html>
<html>
	<head>
		@include('layouts.partials.scripts')
	</head>
	<body>
		<div class="body">
			@include('layouts.partials.header')
			<div role="main" class="main shop">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <hr class="tall">
            </div>
          </div>
          <div class="row">
            @foreach($oferta as $oferta)
            <div class="col-md-6">
              <div class="featured-box featured-box-tertiary featured-box-text-left">
                <div class="box-content">
                  <div class="row">
                    <div class="col-md-9">
                      <h2>Oferta 1</h2>
                    </div>
                    <div class="col-md-1">
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
                            <td style="text-align:right"><b>Paga</b></td><td style="text-align:right"><h2>S/. <?php $paga=$precio-$valorDescuento; echo number_format($paga,2); ?></h2></td>
                          </tr>
                        </tbody>
                      </table>
                      <button class="btn btn-success mr-xs mb-lg" type="button" onclick="agregarOferta()" >Agregar al Carrito <i class="fa fa-cart-arrow-down" aria-hidden="true"></i></button>
                    </div>
                  </div>
                </div>

              </div>
            </div>
            @endforeach
            <div class="col-md-6">
              <br>
              <div class="summary entry-summary">
                <h1 class="mb-none"><strong>{{$curso->titulo}}</strong></h1>
                <div class="reVer_num">
                  <span class="count" itemprop="ratingCount">2</span> calificaciones
                </div>
                <div title="Rated 5.00 out of 5" class="star-rating">
                  <span style="width:100%"><strong class="rating">5.00</strong> out of 5</span>
                </div>
                <p class="price">
                  <?php if($curso->tipo_desc==''){ ?>
                    <span class="amount">S/.{{$curso->precio1}}</span>
                  <?php
                    }else{
                      $precio=intval($curso->precio1); $tipo_desc=$curso->tipo_desc; $monto_desc=intval($curso->monto_desc);
                      if($tipo_desc=='porcentaje'){
                        $saldo=($precio*$monto_desc)/100;
                        $descuento=$precio-intval($saldo);
                      }else if($tipo_desc=='monto'){
                        $descuento=intval($precio)-intval($monto_desc);
                    }	?>
                    <del style="color:#cccccc;font-size:17px"><span class="amount" >S/.{{$curso->precio1}}</span></del>
                    <span class="amount">S/.<?php echo  number_format($descuento, 2, '.', ' '); ?></span>
                  <?php } ?>
                </p>
                <a href="/cursos/{{$curso->id}}" class="btn btn-primary" type="button" name="button">Mas Informacion del Curso <i class="fa fa-external-link" aria-hidden="true"></i></a>
                <br><br>
                <p class="taller">{{$curso->descripcion_corta}}</p>

                <div class="product_meta">
                  <span class="posted_in">Categoria: <a rel="tag" href="#">{{$categoria->descripcion}}</a></span>
                </div>
                <div class="product_meta">
                  <span class="posted_in">Tipo Modalidad: <a rel="tag" href="#">{{$tipo->descripcion}}</a></span>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="tabs tabs-product">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#horarios" data-toggle="tab">HORARIOS:</a></li>
                  <li><a href="#descripcion" data-toggle="tab">DESCRIPCIÓN</a></li>
                  <li><a href="#dirigido" data-toggle="tab">DIRIGIDO A:</a></li>
                  <li><a href="#finalizado" data-toggle="tab">FINALIZADO, EL ALUMNO SERÁ CAPAZ DE:</a></li>
                  <li><a href="#comentarios" data-toggle="tab">COMENTARIOS:</a></li>
                </ul>
                <div class="tab-content">
                  <div class="tab-pane active" id="horarios">
                    @include('cursos.horarios')
                  </div>
                  <div class="tab-pane" id="descripcion">
                    {!!$curso->descripcion!!}
                  </div>
                  <div class="tab-pane" id="dirigido">
                    {!!$curso->dirigido!!}
                  </div>
                  <div class="tab-pane" id="finalizado">
                    {!!$curso->finalizado!!}
                  </div>
                  <div class="tab-pane" id="comentarios">
                    @include('cursos.comentarios')
                  </div>
                </div>
              </div>
            </div>
          </div>


            <h4 class="mb-md text-uppercase"><strong>Otras Ofertas del curso.</strong></h4>
            <?php if(count($otrasOfertas)==0){ ?>
              <p>No hay Ofertas Disponibles.</p>
            <?php }else{ ?>
              <?php $numOferta=2; ?>
              <div class="featured-boxes featured-boxes-style-8">
                <div class="row">
                  @foreach($otrasOfertas as $oferta)
                  <div class="col-md-4">
                    <div class="featured-box featured-box-tertiary featured-box-text-left">
                      <div class="box-content">
                        <div class="row">
                          <div class="col-md-9">
                            <h2>Oferta {{$numOferta}}</h2>
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
                                  <td style="text-align:right"><b>Paga</b></td><td style="text-align:right"><h2>S/. <?php $paga=$precio-$valorDescuento; echo number_format($paga,2); ?></h2></td>
                                </tr>
                              </tbody>
                            </table>
                            <button class="btn btn-success mr-xs mb-lg" type="button" onclick="agregarOferta()" >Agregar al Carrito <i class="fa fa-cart-arrow-down" aria-hidden="true"></i></button>
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




        </div>
			</div>
			@include('layouts.partials.footer')
		</div>
		@include('layouts.partials.vendor')
		@include('cursos.modal')
	</body>
	@section('scripts')
		<script src="{{ asset('/js/propio/cursosShow.js') }}" type="text/javascript"></script>
	@show
</html>
