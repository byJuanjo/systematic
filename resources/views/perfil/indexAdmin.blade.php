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
                  <li class="active">Perfil de Administrador</li>
                </ul>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <h1>Perfil de Administrador</h1>
              </div>
            </div>
          </div>
        </section>
        <div class="container">
					<div id="descAdmin">
						@include('perfil.descAdmin')
					</div>
					<div class="row">
					  <div class="col-md-12">
							<div class="tabs">
								<ul class="nav nav-tabs">
									<?php if($user->check1==1){ ?>
									<li class="active"><a href="#newUser" data-toggle="tab"><i class="fa fa-user" aria-hidden="true"></i> Administrador de Usuarios</a></li>
									<?php } if($user->check10==1){ ?>
									<li><a href="#comentarios" data-toggle="tab"><i class="fa fa-comments" aria-hidden="true"></i> Consultas por Responder</a></li>
									<?php } if($user->check11==1){ ?>
				        	<li><a href="#suscritos" data-toggle="tab"><i class="fa fa-user-plus" aria-hidden="true"></i> Suscritos</a></li>
									<?php } if($user->check12==1){ ?>
									<li><a href="#reportes" data-toggle="tab"><i class="fa fa-file" aria-hidden="true"></i> Reportes</a></li>
									<?php } if($user->check2==1){ ?>
									<li><a href="#permisos" data-toggle="tab"><i class="fa fa-hand-paper-o" aria-hidden="true"></i> Permisos</a></li>
									<?php } ?>
								</ul>
								<div class="tab-content">

									<?php if($user->check1==1){ ?>
									<div id="newUser" class="tab-pane active">
										<div class="box well" id="formViewAdd">
										  @include('perfil.formAdd')
										</div>
									</div>
									<?php } if($user->check2==1){ ?>
					        <div id="permisos" class="tab-pane">
					          <div class="box well">
					            @include('perfil.permisos')
					          </div>
					        </div>
									<?php } if($user->check10==1){ ?>
									<div id="comentarios" class="tab-pane">
										<div class="box well" id="listComentarios">
											@include('perfil.consultasAdmin')
										</div>
									</div>
									<?php } if($user->check11==1){ ?>
									<div id="suscritos" class="tab-pane">
										<div class="box well" id="listComentarios">
											@include('perfil.suscritos')
										</div>
									</div>
								<?php } if($user->check12==1){ ?>
									<div id="reportes" class="tab-pane">
										<div class="box well" id="listComentarios">
											@include('perfil.reportes')
										</div>
									</div>
									<?php } ?>
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
	<script type="text/javascript">
		function CKupdate() {
			for (instance in CKEDITOR.instances)
			CKEDITOR.instances[instance].updateElement();
			return true;
		}
		$(function(){
		 $('[data-toggle="tooltip"]').tooltip();
		});
		$(document).ready(function(){
	    cargar_dataTable();
			cargar_suscriptores();

			$('#tb_suscritos tbody').on('click', 'tr', function () {
				$("#tb_suscritos tbody tr").removeClass('selected');
					fila=$("#tb_suscritos tbody tr")[table.row( this ).index()].innerHTML;
					codigo=$(fila)[0].innerHTML;
					if ( $(this).hasClass('selected') ) {
						$(this).removeClass('selected');
						$('#suscripcion_id').val('');
					}
					else {
					table.$('tr.selected').removeClass('selected');
						$(this).addClass('selected');
						$('#suscripcion_id').val(codigo);
					}
			});

	  });
		function cargar_dataTable(){
			table=$('#tbUsers').DataTable();
			table=$('#tbUsers').DataTable();
			$('#tbUsers tbody').on('click','tr',function(){
				fila=$("#tbUsers tbody tr")[table.row(this).index()].innerHTML;
				codigo=$(fila)[0].innerHTML;
				if($(this).hasClass('selected')){
					$(this).removeClass('selected');
					$('#codigo').val('');
				}
				else {
				table.$('tr.selected').removeClass('selected');
					$(this).addClass('selected');
					$('#codigo').val(codigo);
				}
			});
		}
		function cargar_suscriptores(){
			$('#tb_suscritos').DataTable({
				"destroy": true,
 				"processing" : true,
 				"serverSide" : true,
 				"columns"    : [
 					{data:'id'},
					{data:'nombre'},
 					{data:'email'},
 					{data:'celular'},
					{data:'activo'},
					{data:'cursos.titulo'},
					{data:'fecha'},
					{data:'telemarketing'},
					{data:'observaciones'},

 				],
 				ajax: {
 					'url': 'pagination_suscritos',
 					'type': 'POST',
 					'headers': {
 							'X-CSRF-TOKEN': '{{ csrf_token() }}'
 					}
 				},
 			});
		}
	</script>
	@section('scripts')
		<script src="{{ asset('/js/propio/perfil.js') }}" type="text/javascript"></script>
	@show
</html>
