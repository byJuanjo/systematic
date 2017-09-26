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
                  <li class="active">CERTIPORT</li>
                </ul>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <h1>CERTIPORT</h1>
              </div>
            </div>
          </div>
        </section>
        <div class="container">
					<div class="descripcion_inf">
            @include('pagina.certiport.descripcion')
					</div>
        </div>
      </div>
      @include('layouts.partials.footer')
    </div>
    @include('layouts.partials.vendor')
    @include('pagina.certiport.modal')
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
		<script src="{{ asset('/js/propio/certiport.js') }}" type="text/javascript"></script>
	@show
</html>
