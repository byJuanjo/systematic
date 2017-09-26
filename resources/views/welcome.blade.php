
<!DOCTYPE html>
<html>
	<head>
		@include('layouts.partials.scripts')
	</head>
	<body>
		<div class="body">
			@include('layouts.partials.header')
			<div role="main" class="main">
				<?php if($banner->tipo=='IMAGEN'){ ?>
					<div class="slider-container rev_slider_wrapper" style="height: 700px;">
						<div id="revolutionSlider" class="slider rev_slider" data-plugin-revolution-slider data-plugin-options='{"gridwidth": 800, "gridheight": 700}'>
							<ul>
								<li data-transition="fade">
									<img src="img/slides/{{$banner->imagen1}}"
										alt=""
										data-bgposition="center center"
										data-bgfit="cover"
										data-bgrepeat="no-repeat"
										class="rev-slidebg">
									<div class="tp-caption"
										data-x="center" data-hoffset="-150"
										data-y="center" data-voffset="-95"
										data-start="1000"
										style="z-index: 5"
										data-transform_in="x:[-300%];opacity:0;s:500;"><img src="img/slides/slide-title-border.png" alt=""></div>
									<div class="tp-caption top-label"
										data-x="center" data-hoffset="0"
										data-y="center" data-voffset="-95"
										data-start="500"
										style="z-index: 5"
										data-transform_in="y:[-300%];opacity:0;s:500;">{{$banner->textoa1}}</div>
									<div class="tp-caption"
										data-x="center" data-hoffset="150"
										data-y="center" data-voffset="-95"
										data-start="1000"
										style="z-index: 5"
										data-transform_in="x:[300%];opacity:0;s:500;"><img src="img/slides/slide-title-border.png" alt=""></div>
									<div class="tp-caption main-label"
										data-x="center" data-hoffset="0"
										data-y="center" data-voffset="-45"
										data-start="1500"
										data-whitespace="nowrap"
										data-transform_in="y:[100%];s:500;"
										data-transform_out="opacity:0;s:500;"
										style="z-index: 5"
										data-mask_in="x:0px;y:0px;">{{$banner->textoa2}}</div>
									<div class="tp-caption bottom-label"
										data-x="center" data-hoffset="0"
										data-y="center" data-voffset="5"
										data-start="2000"
										style="z-index: 5"
										data-transform_in="y:[100%];opacity:0;s:500;">{{$banner->textoa3}}</div>
									<a href="/login" class="tp-caption btn btn-lg btn-primary btn-slider-action"
										data-x="center" data-hoffset="0"
										data-y="center" data-voffset="80"
										data-start="2200"
										data-whitespace="nowrap"
										data-transform_in="y:[100%];s:500;"
										data-transform_out="opacity:0;s:500;"
										style="z-index: 5">{{$banner->textoboton}}</a>
								</li>
								<li data-transition="fade">
									<img src="img/slides/{{$banner->imagen2}}"
										alt=""
										data-bgposition="center center"
										data-bgfit="cover"
										data-bgrepeat="no-repeat"
										class="rev-slidebg"
										style="z-index: 15">
									<div class="tp-caption"
										data-x="center" data-hoffset="-190"
										data-y="center" data-voffset="-95"
										data-start="1000"
										style="z-index: 5"
										data-transform_in="x:[-300%];opacity:0;s:500;"><img src="img/slides/slide-title-border.png" alt=""></div>
									<div class="tp-caption top-label"
										data-x="center" data-hoffset="0"
										data-y="center" data-voffset="-95"
										data-start="500"
										style="z-index: 5"
										data-transform_in="y:[-300%];opacity:0;s:500;">por que la buena Capacitación</div>
									<div class="tp-caption"
										data-x="center" data-hoffset="190"
										data-y="center" data-voffset="-95"
										data-start="1000"
										style="z-index: 5"
										data-transform_in="x:[300%];opacity:0;s:500;"><img src="img/slides/slide-title-border.png" alt=""></div>
									<div class="tp-caption main-label"
										data-x="center" data-hoffset="0"
										data-y="center" data-voffset="-40"
										data-start="1500"
										data-whitespace="nowrap"
										data-transform_in="y:[100%];s:500;"
										data-transform_out="opacity:0;s:500;"
										style="z-index: 5"
										data-mask_in="x:0px;y:0px;">Systematic</div>
									<div class="tp-caption bottom-label"
										data-x="center" data-hoffset="0"
										data-y="center" data-voffset="5"
										data-start="2000"
										style="z-index: 5"
										data-transform_in="y:[100%];opacity:0;s:500;">Genera mejor Productividad</div>
									<div class="tp-dottedoverlay tp-opacity-overlay"></div>
								</li>
							</ul>
						</div>
					</div>
				<?php }else{ ?>
					<div class="slider-container light rev_slider_wrapper">
						<div id="revolutionSlider" class="slider rev_slider" data-plugin-revolution-slider data-plugin-options='{"gridwidth": 500, "gridheight": 500}'>
							<ul>
								<li data-transition="fade">
									<img src="img/slides/light-cover.jpg"
										alt="" data-bgposition="center center" data-bgfit="cover"
										data-bgrepeat="no-repeat"	class="rev-slidebg">
									<div class="rs-background-video-layer"
										data-forcerewind="on"	data-volume="mute" data-videowidth="100%"
										data-videoheight="100%"	data-videomp4="video/light.mp4"
										data-videopreload="preload"	data-videoloop="loop"	data-forceCover="1"	data-aspectratio="16:9"	data-autoplay="true" data-autoplayonlyfirsttime="false"	data-nextslideatend="true"
									></div>
									<div class="tp-caption"	data-x="center" data-hoffset="-150"	data-y="188" data-start="1000" style="z-index: 5"
										data-transform_in="x:[-300%];opacity:0;s:500;"><img src="img/slides/slide-title-border-light.png" alt=""></div>

									<div class="tp-caption top-label"	data-x="center" data-hoffset="0" data-y="188"	data-start="500" style="z-index: 5"
										data-transform_in="y:[-300%];opacity:0;s:500;">{{$banner->textoa1}}</div>

									<div class="tp-caption"	data-x="center" data-hoffset="150" data-y="188"
										data-start="1000"	style="z-index: 5"
										data-transform_in="x:[300%];opacity:0;s:500;"><img src="img/slides/slide-title-border-light.png" alt=""></div>

									<div class="tp-caption main-label" data-x="center" data-hoffset="0" data-y="218"
										data-start="1500"	data-whitespace="nowrap" data-transform_in="y:[100%];s:500;"
										data-transform_out="opacity:0;s:500;"
										style="z-index: 5"
										data-mask_in="x:0px;y:0px;">{{$banner->textoa2}}</div>

									<div class="tp-caption bottom-label"
										data-x="center" data-hoffset="0"
										data-y="288"
										data-start="2000"
										style="z-index: 5"
										data-transform_in="y:[100%];opacity:0;s:500;">{{$banner->textoa3}}</div>
								</li>
							</ul>
						</div>
					</div>
				<?php } ?>
				<div class="home-intro" id="home-intro">
					<div class="container">
						<div class="row">
							<div class="col-md-8">
								<p>
									La manera mas rapida de comprar tus cursos
									<span>Revisa nuestro amplio catalogo y elige el curso que mas desees.
								</p>
							</div>
							<div class="col-md-4">
								<div class="mt-lg mb-xl">
									@if(!Auth::guest())
										<a href="#demos" data-hash class="btn btn-warning mr-md" onclick="modificar_banner()">MODIFICAR BANNER</a>
									@endif
									<a href="#demos" data-hash class="btn btn-primary mr-md appear-animation" data-appear-animation="fadeInDown" data-appear-animation-delay="300">Ver Catalogo</a>
									<span class="appear-animation" data-appear-animation="fadeInDown" data-appear-animation-delay="600">
								</div>
							</div>
						</div>
					</div>
				</div>
				@include('layouts.partials.tienda')
			</div>
			@include('layouts.partials.footer')
		</div>
		@include('layouts.partials.vendor')
	</div>
	<div class="modal fade bd-example-modal" id="modalBanner" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Mantenimiento de Banner</h4>
				</div>
				<div class="modal-body">
					<div class="box well" id="modalBannerContent">
					</div>
					<div class="capa">
						<div id="loader"></div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>
				</div>
			</div>
		</div>
	</div>
	</body>
</html>
