@foreach($infraestructuras as $infraestructura)
<div class="row">
  <div class="col-md-12">
    <h3 class="heading-primary">
      <strong>{{$infraestructura->titulo}}</strong>
      @if(!Auth::guest())
        @if(Auth::user()->check3=='1')
        &nbsp;
          <i class="fa fa-pencil-square-o" style="color:#ffc03a" aria-hidden="true"  data-toggle="tooltip" title="Edita esta sección de Infraestructura" onclick="editar_infraestructura('{{$infraestructura->id}}')"></i>
          <i class="fa fa-picture-o" style="color:green" aria-hidden="true" data-toggle="tooltip" title="Agregar Imagen a esta seccion" onclick="agregar_imagen_inf('{{$infraestructura->id}}')"></i>
          <i class="fa fa-trash-o" style="color:red" aria-hidden="true" data-toggle="tooltip" title="Elimina esta sección de Infraestructura" onclick="eliminar_infraestructura('{{$infraestructura->id}}')"></i>
        @endif
      @endif
    </h3>
    {!!$infraestructura->html!!}
    <br>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
  	<div class="content-grid mt-lg mb-lg">
  		<div class="row content-grid-row">
        @foreach($infraestructura->imagenes as $imagen)
  			<div class="content-grid-item col-md-6 center">
  				<img class="img-responsive" src="img/infraestructura/{{$imagen->ruta}}" alt="">
          @if(!Auth::guest())
            @if(Auth::user()->check3=='1')
            <i class="fa fa-trash-o pull-left" style="color:red;font-size:17px" aria-hidden="true"  data-toggle="tooltip" title="Elimina esta imagen de la galeria." onclick="quitar_imagen_inf('{{$imagen->id}}','{{$infraestructura->id}}')"></i>
            @endif
          @endif
  			</div>
        @endforeach
  		</div>
  	</div>
  </div>
</div>
<hr class="tall">
@endforeach
@if(!Auth::guest())
  @if(Auth::user()->check3=='1')
  <i class="fa fa-plus-circle" style="color:green;font-size:20px" aria-hidden="true" data-toggle="tooltip" title="Agregar Seccion" onclick="agregar_sec()"></i>
  @endif
@endif
