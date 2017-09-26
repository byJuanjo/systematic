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
                  <li class="active">Promociones</li>
                </ul>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <h1>Promociones</h1>
              </div>
            </div>
          </div>
        </section>
        <div class="container">
          <div class="col-md-12">
            <p class="price">
              <div class="box well">
                <div class="row">
                  <div class="form-group col-lg-12">
                    <label for="">Tipo descuento</label>
                    <select class="form-control" name="tipo_desc" id="tipo_desc" onchange="tipo_descuento(this.value)">
                      <option value=""></option>
                      <option value="porcentaje">Porcentaje</option>
                      <option value="monto">Monto</option>
                    </select>
                  </div>
                  <div class="form-group col-lg-12">
                    <label for="">Monto descuento</label>
                    <input type="number" name="monto_desc" id="monto_desc" class="form-control" placeholder="Descuento" value="">
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-12">
                    <div class="col-lg-4 col-md-4 col-xs-4">
                      <label for="oferta">Oferta</label>
                      <input type="radio" name="bolita" id="oferta" value="Oferta">
                    </div>
                    <div class="col-lg-4 col-md-4 col-xs-4">
                      <label for="nuevo">Nuevo</label>
                      <input type="radio" name="bolita" id="nuevo" value="Nuevo" >
                    </div>
                    <div class="col-lg-4 col-md-4 col-xs-5">
                      <label for="vacio">Vacio</label>
                      <input type="radio" name="bolita" id="vacio" value="Desactivado" checked >
                    </div>
                  </div>
                </div>
                <ul>
                  <div>
                    <div class="row">
                      @foreach($categorias as $categoria)
                      <div class="col-md-3">
                        <span class="dropdown-mega-sub-title">{{$categoria->descripcion}}</span>
                        <ul class="list list-icons list-icons-sm ">
                          @foreach($cursos as $curso)
                          <?php
                            if($curso->categorias_id==$categoria->id){
                          ?>
                          <li> <input type="checkbox" name="" id="" value=""><label for=""> {{$curso->titulo}}</label></li>
                          <?php
                            }
                           ?>
                          @endforeach
                        </ul>
                      </div>
                      @endforeach
                    </div>
                  </div>
                </ul>
              </div>
          </div>
        </div>
      </div>
      @include('layouts.partials.footer')
    </div>
    @include('layouts.partials.vendor')
  </body>
	@section('scripts')
		<script src="{{ asset('/js/propio/infraestructura.js') }}" type="text/javascript"></script>
	@show
</html>
