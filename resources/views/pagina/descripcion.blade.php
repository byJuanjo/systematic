@if(!Auth::guest())
  @if(Auth::user()->check3=='1')
  <i class="fa fa-plus-circle" style="color:green;font-size:20px" aria-hidden="true" data-toggle="tooltip" title="Agregar Seccion" onclick="agregar_sec()"></i>
  @endif
@endif
@foreach($elearnings as $elearning)
<div class="row">
  <div class="col-md-12">
    <h3 class="heading-primary">
      <strong>{{$elearning->titulo}}</strong>
      @if(!Auth::guest())
        @if(Auth::user()->check3=='1')
        &nbsp;
          <i class="fa fa-pencil-square-o" style="color:#ffc03a" aria-hidden="true"  data-toggle="tooltip" title="Edita esta sección de Infraestructura" onclick="editar_elearning('{{$elearning->id}}')"></i>
          <i class="fa fa-trash-o" style="color:red" aria-hidden="true" data-toggle="tooltip" title="Elimina esta sección de Infraestructura" onclick="eliminar_elearning('{{$elearning->id}}')"></i>
        @endif
      @endif
    </h3>
    {!!$elearning->html!!}
    <br>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
  	<div class="content-grid mt-lg mb-lg">
      <div class="content-grid-item col-md-6 col-xs-12 center">
        <img class="img-responsive" src="/img/elearning/{{$elearning->img}}" alt="">
      </div>
  	</div>
  </div>
</div>
<hr class="tall">
@endforeach
