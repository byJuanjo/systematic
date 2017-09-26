@if(!Auth::guest())
  @if(Auth::user()->check3=='1')
  <i class="fa fa-plus-circle" style="color:green;font-size:20px" aria-hidden="true" data-toggle="tooltip" title="Agregar Seccion" onclick="agregar_sec()"></i>
  @endif
@endif
@foreach($valores as $valor)
<div class="row">
  <div class="col-md-12">
    <h3 class="heading-primary">
      <strong>{{$valor->titulo}}</strong>
      @if(!Auth::guest())
        @if(Auth::user()->check3=='1')
        &nbsp;
          <i class="fa fa-pencil-square-o" style="color:#ffc03a" aria-hidden="true"  data-toggle="tooltip" title="Edita esta sección de Infraestructura" onclick="editar_valores('{{$valor->id}}')"></i>
          <i class="fa fa-trash-o" style="color:red" aria-hidden="true" data-toggle="tooltip" title="Elimina esta sección de Infraestructura" onclick="eliminar_valores('{{$valor->id}}')"></i>
        @endif
      @endif
    </h3>

  </div>
</div>
<div class="row">
  <div class="col-md-4">
    <img class="img-responsive" src="/img/valores/{{$valor->img}}" alt="">
  </div>
  <div class="col-md-8">
    {!!$valor->html!!}
  </div>
</div>
<hr class="tall">
@endforeach
