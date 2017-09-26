
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
            <h3>Modulo de Ventas</h3>
            <div class="col-md-12">
							<div class="tabs">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#individual" data-toggle="tab"><i class="fa fa-user" aria-hidden="true"></i> Individual</a></li>
                  <li><a href="#corporativa" data-toggle="tab"><i class="fa fa-users" aria-hidden="true"></i> Corporativa</a></li>
                  <li><a href="#historial" data-toggle="tab"><i class="fa fa-book" aria-hidden="true"></i> Mi historial</a></li>
                  <li><a href="#horario" data-toggle="tab"><i class="fa fa-clock-o" aria-hidden="true"></i> Cambio de horario</a></li>
                  <li><a href="#curso" data-toggle="tab"><i class="fa fa-desktop" aria-hidden="true"></i> Cambio de curso</a></li>
                  <li><a href="#traslado" data-toggle="tab"><i class="fa fa-arrow-right" aria-hidden="true"></i> Traslado de Vancante</a></li>
                </ul>
                <div class="tab-content">
                  <div id="individual" class="tab-pane active">
                    <div class="box well" id="formViewAdd">
                      @include('ventas.tabs.individual')
                    </div>
                  </div>
                  <div id="corporativa" class="tab-pane">
                    <div class="box well" id="formViewAdd">
                      @include('ventas.tabs.corporativa')
                    </div>
                  </div>
                  <div id="historial" class="tab-pane">
                    <div class="box well" id="miHistorial_content">
                      @include('ventas.tabs.miHistorial')
                    </div>
                  </div>
                  <div id="horario" class="tab-pane">
                    <div class="box well" id="formViewAdd">
                      horario
                    </div>
                  </div>
                  <div id="curso" class="tab-pane">
                    <div class="box well" id="formViewAdd">
                      curso
                    </div>
                  </div>
                  <div id="traslado" class="tab-pane">
                    <div class="box well" id="formViewAdd">
                      traslado
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
			</div>
			@include('layouts.partials.footer')
		</div>
		@include('layouts.partials.vendor')
		@include('ventas.modal')
	</body>
	<script type="text/javascript">
	$(document).ready(function(){
		cargar_historial();
		$('#tb_miHistorial tbody').on('click', 'tr', function () {
			$("#tb_miHistorial tbody tr").removeClass('selected');
				fila=$("#tb_miHistorial tbody tr")[table.row( this ).index()].innerHTML;
				codigo=$(fila)[0].innerHTML;
				if ( $(this).hasClass('selected') ) {
					$(this).removeClass('selected');
					$('#ventas_hi_id').val('');
				}
				else {
				table.$('tr.selected').removeClass('selected');
					$(this).addClass('selected');
					$('#ventas_hi_id').val(codigo);
				}
		});
		function cargar_historial(){
			table=$('#tb_miHistorial').DataTable({
				"destroy": true,
 				"processing" : true,
 				"serverSide" : true,
 				"columns"    : [
 					{data:'id'},
					{data:'tipoVenta'},
					{data:'user.razon_social'},
					{data:'cursos.titulo'},
					{data:'precio'},
 				],
 				ajax: {
 					'url': 'pagination_miHistorial',
 					'type': 'POST',
 					'headers': {
 							'X-CSRF-TOKEN': '{{ csrf_token() }}'
 					}
 				},
 			});
		}
	});
	</script>
	@section('scripts')
		<script src="{{ asset('/js/propio/ventas.js') }}" type="text/javascript"></script>
	@show
</html>
