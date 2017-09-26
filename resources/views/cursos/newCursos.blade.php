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
                  <li class="active">Cursos</li>
                </ul>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <h1>MANTENIMIENTO DE CURSOS</h1>
              </div>
            </div>
          </div>
        </section>
        <div class="container">
					@include('cursos.newForm')
        </div>
      </div>
      @include('layouts.partials.footer')
    </div>
    @include('layouts.partials.vendor')
		@include('cursos.modal')
  </body>
	@section('scripts')
		<script src="{{ asset('/js/propio/cursos.js') }}" type="text/javascript"></script>
	@show
	<script type="text/javascript">
		function CKupdate() {
			for (instance in CKEDITOR.instances)
			CKEDITOR.instances[instance].updateElement();
			return true;
		}
	</script>
</html>
