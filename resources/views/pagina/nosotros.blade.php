<!DOCTYPE html>
<html>
	<head>
    @include('layouts.partials.scripts')
  </head>
  <body>
    <div class="body">
      @include('layouts.partials.header')
      <div role="main" class="main">
        <section class="page-header">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <ul class="breadcrumb">
                  <li><a href="/">Inicio</a></li>
                  <li class="active">Nosotros</li>
                </ul>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <h1>Nosotros</h1>
              </div>
            </div>
          </div>
        </section>
        <div class="container">
					<div class="row">
						<div class="col-md-12">
              <div class="featured-box featured-box-primary">
                <div style="text-align:left" class="box-content">
                  <h4 class="text-uppercase">
										Galeria
									  @if(!Auth::guest())
										@if(Auth::user()->check3=='1')&nbsp; <i class="fa fa-plus-circle" onclick="update_galeria()" style="color:green" aria-hidden="true" data-toggle="tooltip" title="Agrega mas imagenes a la galeria de nosotros"></i> @endif
										@endif
									</h4>
                  <ul class="thumbnail-gallery" id="galeria_imagenes" data-plugin-lightbox data-plugin-options='{"delegate": "a", "type": "image", "gallery": {"enabled": true}}'>
										@include('pagina.nosotros.galeria')
                  </ul>
                </div>
              </div>
            </div>
					</div>
					<div class="descripcion_nos">
						@include('pagina.nosotros.descripcion')
					</div>
        </div>
      </div>
      @include('layouts.partials.footer')
    </div>
    @include('layouts.partials.vendor')
		@include('pagina.nosotros.modal')
  </body>
	<script type="text/javascript">
	function CKupdate() {
		for (instance in CKEDITOR.instances)
		CKEDITOR.instances[instance].updateElement();
		return true;
	}
	$(function(){
	 $('[data-toggle="tooltip"]').tooltip();
	});
	</script>
	@section('scripts')
		<script src="{{ asset('/js/propio/nosotros.js') }}" type="text/javascript"></script>
	@show
</html>
