
<!DOCTYPE html>
<html>
	<head>
		@include('layouts.partials.scripts')
	</head>
	<body>
		<div class="body">
			@include('layouts.partials.header')
			<div role="main" class="main shop">
        <section class="page-header">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <ul class="breadcrumb">
                  <li><a href="/cursos/{{$modulo->cursos[0]->id}}">Regresar</a></li>
                  <li class="active">Modulos</li>
                </ul>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <h1>Modulos</h1>
              </div>
            </div>
          </div>
        </section>
        <div class="container">
          <div class="row">
            <div class="col-md-9">
              <div class="row">
                <div class="col-md-6">
                  <div class="owl-carousel owl-theme" data-plugin-options='{"items": 1, "margin": 10}'>
										<?php
											$imagen=$modulo->ruta;
											if($imagen==''){
										?>
										<div><img alt="" height="300" class="img-responsive" src="/img/cursos/profile_curso.jpg"></div>
										<?php	}else{ ?>
										<div><img alt="" height="300" class="img-responsive" src="/img/cursos/{{$imagen}}"></div>
										<?php } ?>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="summary entry-summary">
                    <h1 class="mb-none"><strong>{{$modulo->titulo}}</strong></h1>
                    <p class="price">
											<span class="amount">S/.{{$modulo->precio}}</span>
                    </p>
                    <form enctype="multipart/form-data" method="post" class="cart">
                      <div class="quantity">
                        <input type="button" class="minus" value="-">
                        <input type="text" class="input-text qty text" title="Qty" value="1" name="quantity" min="1" step="1">
                        <input type="button" class="plus" value="+">
                      </div>
                      <button href="#" class="btn btn-primary btn-icon">Agregar al carrito</button>
                    </form>
                  </div>
                </div>
              </div>
							<div class="row">
								<div class="col-md-12">
									<div class="panel-group" id="accordion">
										<div class="panel panel-default">
											<div class="panel-heading">
												<h4 class="panel-title">
													<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" >
														Horarios
													</a>
												</h4>
											</div>
											<div id="collapse" class="accordion-body collapse in">
												<div class="panel-body">
													@include('cursos.horarios')
												</div>
											</div>
										</div>
									</div>
									@foreach($mdatos as $mdato)
									<div class="panel-group" id="accordion">
										<div class="panel panel-default">
											<div class="panel-heading">
												<h4 class="panel-title">
													<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse{{$mdato->titulo}}">
														{{$mdato->titulo}}
													</a>
												</h4>
											</div>
											<div id="collapse{{$mdato->titulo}}" class="accordion-body collapse in">
												<div class="panel-body">
													{!!$mdato->descripcion!!}
												</div>
											</div>
										</div>
									</div>
									@endforeach
								</div>
							</div>
            </div>
            <div class="col-md-3">
              <h5 class="heading-primary">Modulos del Curso</h5>
              <ul class="simple-post-list">
                <?php if(count($relacionados)==0){ ?>
                  <li>
                    <h6>No existen otros modulos en el curso.</h6>
                  </li>
                <?php } ?>
                @foreach($relacionados as $relacionado)
                <li>
                  <div class="post-image">
                    <div class="img-thumbnail">
                      <a href="/modulo/{{$relacionado->id}}">
                        <?php if(!isset($relacionado->imagenes[0])){ ?>
                          <img  width="60" height="60" class="img-responsive" src="/img/cursos/profile_curso.jpg">
                        <?php }else{ ?>
                          <img  width="60" height="60" class="img-responsive" src="/img/cursos/{{$relacionado->imagenes[0]->ruta}}">
                        <?php } ?>
                      </a>
                    </div>
                  </div>
                  <div class="post-info">
                    <a href="/modulo/{{$relacionado->id}}">{{$relacionado->titulo}}</a>
                    <div class="post-meta">
                      <span class="price">
                        <?php if($relacionado->tipo_desc==''){ ?>
                          <span class="amount">S/.{{$relacionado->precio}}</span>
                        <?php } ?>
                      </span>
                    </div>
                  </div>
                </li>
                @endforeach
              </ul>
            </div>
          </div>
        </div>
			</div>
			@include('layouts.partials.footer')
		</div>
		@include('layouts.partials.vendor')

	</body>
</html>
