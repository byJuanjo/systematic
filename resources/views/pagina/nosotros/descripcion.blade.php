
<div class="row">
  <div class="col-md-12">
    <h3 class="heading-primary">
      <strong>{{$nosotros->titulo}}</strong>
      @if(!Auth::guest())
        @if(Auth::user()->check3=='1')
        &nbsp;
          <i class="fa fa-pencil-square-o" style="color:#ffc03a" aria-hidden="true"  data-toggle="tooltip" title="Edita esta seccion de quienes somos" onclick="editar_seccion('#sec1Nosotros')"></i>
        @endif
      @endif
    </h3>
    {!!$nosotros->html!!}
  </div>
</div>
<hr>
<div class="row">
  <div class="col-md-12">
    <h3 class="heading-primary">
      <strong>{{$nosotros->titulo1}}</strong>
      @if(!Auth::guest())
        @if(Auth::user()->check3=='1')
        &nbsp;
          <i class="fa fa-pencil-square-o" style="color:#ffc03a" aria-hidden="true"  data-toggle="tooltip" title="Edita esta seccion de quienes somos" onclick="editar_seccion('#sec2Nosotros')"></i>
        @endif
      @endif
    </h3>
    {!!$nosotros->html1!!}
  </div>
</div>
<hr>
<div class="row">
  <div class="col-md-12">
    <h3 class="heading-primary">
      <strong>{{$nosotros->titulo2}}</strong>
      @if(!Auth::guest())
        @if(Auth::user()->check3=='1')
        &nbsp;
          <i class="fa fa-pencil-square-o" style="color:#ffc03a" aria-hidden="true"  data-toggle="tooltip" title="Edita esta seccion de quienes somos" onclick="editar_seccion('#sec3Nosotros')"></i>
        @endif
      @endif
    </h3>
    {!!$nosotros->html2!!}
  </div>
</div>
