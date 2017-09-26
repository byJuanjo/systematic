
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
					@if(!Auth::guest())
						@if(Auth::user()->check5=='1')
						<div class="row">
							<div class="col-md-12">
								<a href="/curso.edit/{{$curso->id}}" class="btn btn-warning btn-lg"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp; Editar Curso</a>
							</div>
						</div>
						@endif
					@endif
					<br>
          <div class="row">
            <div class="col-md-9">
              <div class="row">
                <div class="col-md-6">
                  <div class="owl-carousel owl-theme" data-plugin-options='{"items": 1, "margin": 10}'>
										<?php	if(count($imagenes)==0){ ?>
										<div><img alt="" height="300" class="img-responsive" src="/img/cursos/profile_curso.jpg"></div>
										<?php	}else{ ?>
										@foreach($imagenes as $imagen)
										<div><img alt="" height="300" class="img-responsive" src="/img/cursos/{{$imagen->ruta}}"></div>
										@endforeach
										<?php } ?>
                  </div>
                </div>
                <div class="col-md-6">
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
                    <p class="taller">{{$curso->descripcion_corta}}</p>
                    <form enctype="multipart/form-data" method="post" class="cart">
                      <div class="quantity">
                        <input type="button" class="minus" value="-">
                        <input type="text" class="input-text qty text" title="Qty" value="1" name="quantity" min="1" step="1">
                        <input type="button" class="plus" value="+">
                      </div>
                      <button href="#" class="btn btn-primary btn-icon">Agregar al carrito</button>
                    </form>
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
							<hr>
							<div class="row">
								<div class="col-md-12">
									<a href="/material/{{$curso->silabo}}" target="_blank" class="btn btn-warning btn-lg"><i class="fa fa-download" aria-hidden="true"></i>&nbsp; Descarga Sílabo</a>
								</div>
							</div>
              <hr class="tall">
							<?php if(count($modulos)>0){ ?>
								<h4 class="mb-md text-uppercase">Modulos de  <strong>{{$curso->titulo}}</strong></h4>
							<?php } ?>

              <div class="row">
                <ul class="products product-thumb-info-list">
									@foreach($modulos as $modulo)
									<li class="col-sm-3 col-xs-12 product">
                    <span class="product-thumb-info">
                      <a href="/carrito.modulo/{{$modulo->id}}" class="add-to-cart-product">
                        <span><i class="fa fa-shopping-cart"></i> Agregar al Carrito</span>
                      </a>
                      <a href="/modulo/{{$modulo->id}}">
                        <span class="product-thumb-info-image">
                          <span class="product-thumb-info-act">
                            <span class="product-thumb-info-act-left"><em>Ver</em></span>
                            <span class="product-thumb-info-act-right"><em><i class="fa fa-plus"></i> detalles</em></span>
                          </span>
                          <img alt="" class="img-responsive" src="/img/cursos/{{$modulo->ruta}}">
                        </span>
                      </a>
                      <span class="product-thumb-info-content">
                        <a href="/modulo/{{$modulo->id}}">
                          <h4>{{$modulo->titulo}}</h4>
                          <span class="price">
                          	S/.<span class="amount">{{$modulo->precio}}</span>
                          </span>
                        </a>
                      </span>
                    </span>
                  </li>
									@endforeach
                </ul>
              </div>
            </div>

            <div class="col-md-3">
              <aside class="sidebar">
                <form>
                  <div class="input-group input-group-lg">
                    <input class="form-control" placeholder="Buscar cursos..." name="s" id="s" type="text">
                    <span class="input-group-btn">
                      <button type="submit" class="btn btn-primary btn-lg"><i class="fa fa-search"></i></button>
                    </span>
                  </div>
                </form>
                <hr>
                <h5 class="heading-primary">Cursos Relacionados</h5>
                <ul class="simple-post-list">
									<?php if(count($relacionados)==0){ ?>
										<li>
											<h6>No existen cursos relacionados.</h6>
										</li>
									<?php } ?>
									@foreach($relacionados as $relacionado)
                  <li>
                    <div class="post-image">
                      <div class="img-thumbnail">
                        <a href="/cursos/{{$relacionado->id}}">
													<?php if(!isset($relacionado->imagenes[0])){ ?>
														<img  width="60" height="60" class="img-responsive" src="/img/cursos/profile_curso.jpg">
													<?php }else{ ?>
														<img  width="60" height="60" class="img-responsive" src="/img/cursos/{{$relacionado->imagenes[0]->ruta}}">
													<?php } ?>
                        </a>
                      </div>
                    </div>
                    <div class="post-info">
                      <a href="/cursos/{{$relacionado->id}}">{{$relacionado->titulo}}</a>
                      <div class="post-meta">
												<span class="price">
				                  <?php if($relacionado->tipo_desc==''){ ?>
				                    <span class="amount">S/.{{$relacionado->precio1}}</span>
				                  <?php
				                    }else{
				                      $precio=intval($relacionado->precio1); $tipo_desc=$relacionado->tipo_desc; $monto_desc=intval($relacionado->monto_desc);
				                      if($tipo_desc=='porcentaje'){
				                        $saldo=($precio*$monto_desc)/100;
				                        $descuento=$precio-intval($saldo);
				                      }else if($tipo_desc=='monto'){
				                        $descuento=intval($precio)-intval($monto_desc);
				                    }	?>
				                    <del style="color:#cccccc;"><span class="amount" >S/.{{$curso->precio1}}</span></del>
				                    <span class="amount">S/.<?php echo  number_format($descuento, 2, '.', ' '); ?></span>
				                  <?php } ?>
				                </span>
                      </div>
                    </div>
                  </li>
									@endforeach
                </ul>
              </aside>
            </div>
						<div class="col-lg-12">
							<div class="ofertas_modulos">
								@include('cursos.ofertas.ofertas')
							</div>
						</div>
          </div>
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
