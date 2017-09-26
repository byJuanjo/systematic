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
                  <li class="active">HORARIOS</li>
                </ul>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <h1>HORARIOS</h1>
              </div>
            </div>
          </div>
        </section>
        <div class="container">
					@if(!Auth::guest())
						@if(Auth::user()->check6=='1')
						<div class="descripcion_inf">
            <div class="row">
              <div class="col-md-12">
                <div class="tabs tabs-vertical tabs-left">
                  <ul class="nav nav-tabs col-sm-2">
										@if(!Auth::guest())	@if(Auth::user()->check9=='1')
										<li class="active">
											<a href="#horarios" data-toggle="tab">Horarios</a>
										</li>
										@endif	@endif
										@if(!Auth::guest())	@if(Auth::user()->check7=='1')
	                    <li>
	                      <a href="#laboratorios" data-toggle="tab">Laboratorios</a>
	                    </li>
											@endif	@endif
										@if(!Auth::guest())	@if(Auth::user()->check8=='1')
                    	<li>
                      	<a href="#docentes" data-toggle="tab">Docentes</a>
                    	</li>
										@endif	@endif

                  </ul>
                  <div class="tab-content">
										@if(!Auth::guest())	@if(Auth::user()->check7=='1')
	                    <div id="laboratorios" class="tab-pane">
	                      @include('horarios.laboratorios.index')
	                    </div>
										@endif	@endif
										@if(!Auth::guest())	@if(Auth::user()->check8=='1')
	                    <div id="docentes" class="tab-pane">
												@include('horarios.docentes.index')
	                    </div>
										@endif	@endif
										@if(!Auth::guest())	@if(Auth::user()->check9=='1')
	                    <div id="horarios" class="tab-pane active">
												@include('horarios.horarios.index')
	                    </div>
										@endif	@endif
                  </div>
                </div>
              </div>
            </div>
					</div>
						@endif
					@endif
					<?php
					if(!Auth::guest()){
						$tipo=Auth::user()->tipo; if($tipo=='1'){ $visible ='display:none';}else{ $visible='display:block';}
					}else{
						$visible='display:block';
					}
					?>
					<div class="descripcion_inf" style="{{$visible}}">
						<div class="row">
							<div class="col-md-12">
								@include('horarios.horarios.dataPublic')
							</div>
						</div>
					</div>
        </div>
      </div>
      @include('layouts.partials.footer')
    </div>
    @include('layouts.partials.vendor')

  </body>
	<script src="{{ asset('/js/propio/horarios.js') }}" type="text/javascript"></script>
	<script type="text/javascript">
	$(document).ready(function(){
		cargar_dataTablehorPublic();
		cargar_dataTableLb();
		cargar_dataTableDoc();
		cargar_dataTablehor();
	});
	function cargar_dataTablehorPublic(){
		table=$('#tbHorariosPublic').DataTable({"order": [[ 3, "desc" ]]});
	}
	function cargar_dataTableLb(){
		table=$('#tbLaboratorios').DataTable();
		$('#tbLaboratorios tbody').on('click','tr',function(){
			fila=$("#tbLaboratorios tbody tr")[table.row(this).index()].innerHTML;
			codigo=$(fila)[0].innerHTML;
			if($(this).hasClass('selected')){
				$(this).removeClass('selected');
				$('#laboratorios_id').val('');
				$('#editLab').html('<h3 class="text-color-tertiary">Elige un registor de la tabla para ver sus datos.</h3>');
			}
			else {
			table.$('tr.selected').removeClass('selected');
				$(this).addClass('selected');
				$('#laboratorios_id').val(codigo);
				show_editLab();
			}
		});
	}
	function cargar_dataTableDoc(){
		table=$('#tbDocentes').DataTable();
		$('#tbDocentes tbody').on('click','tr',function(){
			fila=$("#tbDocentes tbody tr")[table.row(this).index()].innerHTML;
			codigo=$(fila)[0].innerHTML;
			if($(this).hasClass('selected')){
				$(this).removeClass('selected');
				$('#tbDocentes').val('');
				$('#editDoc').html('<h3 class="text-color-tertiary">Elige un registor de la tabla para ver sus datos.</h3>');
			}
			else {
			table.$('tr.selected').removeClass('selected');
				$(this).addClass('selected');
				$('#docentes_id').val(codigo);
				show_editDoc();
			}
		});
	}
	function cargar_dataTablehor(){
		table=$('#tbHorarios').DataTable({"order": [[ 0, "desc" ]]});
		$('#tbHorarios tbody').on('click','tr',function(){
			fila=$("#tbHorarios tbody tr")[table.row(this).index()].innerHTML;
			codigo=$(fila)[0].innerHTML;
			if($(this).hasClass('selected')){
				$(this).removeClass('selected');
				$('#tbHorarios').val('');
				$('#editHor').html('<h3 class="text-color-tertiary">Elige un registor de la tabla para ver sus datos.</h3>');
			}
			else {
			table.$('tr.selected').removeClass('selected');
				$(this).addClass('selected');
				$('#horarios_id').val(codigo);
				show_editHor();
			}
		});
	}

	</script>
</html>
