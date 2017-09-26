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
                  <li class="active">Perfil Corporativo</li>
                </ul>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <h1>Perfil Corporativo</h1>
              </div>
            </div>
          </div>
        </section>
      </div>
      <div class="container">
        <div id="descAdmin">
          @include('perfil.corp.descAdmin')
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="tabs">
              <ul class="nav nav-tabs">
                <li><a href="#misCursos" data-toggle="tab"><i class="fa fa-book" aria-hidden="true"></i> Mis Cursos</a></li>
                <li class="active"><a href="#miChat" data-toggle="tab"><i class="fa fa-comments" aria-hidden="true"></i> Mi chat</a></li>
                <li><a href="#misComentarios" data-toggle="tab"><i class="fa fa-comment" aria-hidden="true"></i> Mis Comentarios</a></li>
              </ul>
							<div class="tab-content">
								<div id="misCursos" class="tab-pane">
									mis cursos
								</div>
								<div id="miChat" class="tab-pane active">
									mi chat
								</div>
								<div id="misComentarios" class="tab-pane">
									@include('perfil.corp.comentarios')
								</div>
							</div>
            </div>
          </div>
        </div>
      </div>
      @include('layouts.partials.footer')
    </div>
    @include('layouts.partials.vendor')
		@include('perfil.modal')
  </body>
	@section('scripts')
		<script src="{{ asset('/js/propio/perfil.js') }}" type="text/javascript"></script>
	@show
</html>
