<div class="row">
  <div class="col-md-12">
    <form class="" action="#" id="newFormCurso" method="post">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group col-lg-12">
            <input type="radio" name="activo" id="activado1" <?php if($curso->activo==1){ ?> checked <?php } ?> value="1"><label for="activado1"> &nbsp; Activado</label>
            &nbsp;&nbsp;
            <input type="radio" name="activo" id="activado2" <?php if($curso->activo==0){ ?> checked <?php } ?> value="0"><label for="activado2"> &nbsp; Desactivado</label>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="owl-carousel owl-theme" data-plugin-options='{"items": 1, "margin": 10}'>
            <?php if(count($imagenes)==0){ ?>
            <div><img alt="" height="300" class="img-responsive" src="/img/cursos/profile_curso.jpg"></div>
            <?php }else{ ?>
              @foreach($imagenes as $imagen)
              <div><img alt="" height="300" class="img-responsive" src="/img/cursos/{{$imagen->ruta}}"></div>
              @endforeach
            <?php } ?>
          </div>
        </div>
        <div class="col-md-6">
          <div class="summary entry-summary">
            <h1 class="mb-none">
              <strong>
                <input class="form-control" type="hidden" id="curso_id" name="curso_id" readonly="true" value="{{$curso->id}}" >
                <input type="hidden" id="token" name="_token" readonly="true" value="{{csrf_token()}}">
                <input class="form-control" autofocus type="text" name="titulo" id="titulo" placeholder="Titulo del curso" value="{{$curso->titulo}}" >
              </strong>
            </h1>
            <p class="price">
              <div class="box well">
                <div class="row">
                  <div class="form-group col-md-12">
                    <label for="">Precio</label>
                    <input type="text" name="precio1" id="precio1" class="form-control" placeholder="Precio 1" value="{{$curso->precio1}}">
                  </div>
                  <div class="form-group col-lg-12">
                    <label for="">Tipo descuento</label>
                    <select class="form-control" name="tipo_desc" id="tipo_desc" onchange="tipo_descuento(this.value)">
                      <option value=""></option>
                      <option <?php if($curso->tipo_desc=="porcentaje"){ ?> selected <?php } ?> value="porcentaje">Porcentaje</option>
                      <option <?php if($curso->tipo_desc=="monto"){ ?> selected <?php } ?> value="monto">Monto</option>
                    </select>
                  </div>
                  <div class="form-group col-lg-12">
                    <label for="">Monto descuento</label>
                    <input type="number" name="monto_desc" id="monto_desc" class="form-control" placeholder="Descuento" <?php if($curso->monto_desc=='0.00'){ ?>readonly<?php } ?> value="{{$curso->monto_desc}}">
                  </div>
                </div>
              </div>

            </p>

            <div class="product_meta">
              <div class="form-group col-md-12">
                <div class="col-lg-4 col-md-4 col-xs-4">
                  <label for="oferta">Oferta</label>
                  <input type="radio" name="bolita" id="oferta" value="Oferta" <?php if($curso->bolita=='Oferta'){ ?> checked <?php } ?> >
                </div>
                <div class="col-lg-4 col-md-4 col-xs-4">
                  <label for="nuevo">Nuevo</label>
                  <input type="radio" name="bolita" id="nuevo" value="Nuevo" <?php if($curso->bolita=='Nuevo'){ ?> checked <?php } ?>>
                </div>
                <div class="col-lg-4 col-md-4 col-xs-5">
                  <label for="vacio">Vacio</label>
                  <input type="radio" name="bolita" id="vacio" value="Desactivado" <?php if($curso->bolita=='Desactivado'){ ?> checked <?php } ?>>
                </div>
              </div>
            </div>
            <p class="taller">
              <textarea name="descripcion_corta" id="descripcion_corta" class="form-control" rows="4" placeholder="Descripcion Resumida.">{{$curso->descripcion_corta}}</textarea>
            </p>
            <a class="btn btn-primary btn-icon" onclick="subirImagenes()">Subir Imagenes <i class="fa fa-upload" aria-hidden="true"></i></a>
            <br><br>
            <div class="product_meta">
              <span class="posted_in">Categoria:
                <select id="categorias_id" name="categorias_id" onchange="editarCampo('categorias_id')">
                  <option value="">Elige una Categoria</option>
                  @foreach($categorias as $categoria)
                    <option <?php if($categoria->id==$curso->categorias_id){ ?> selected<?php } ?> value="{{$categoria->id}}">{{$categoria->descripcion}}</option>
                  @endforeach
                </select>
            </span>
            </div>
            <br>
            <div class="product_meta">
              <span class="posted_in">Tipo Modalidad:
                <select id="tipos_id" name="tipos_id" onchange="editarCampo('tipos_id')">
                  <option value="">Elige un Tipo</option>
                  @foreach($tipos as $tipo)
                    <option <?php if($tipo->id==$curso->tipos_id){ ?> selected<?php } ?> value="{{$tipo->id}}">{{$tipo->descripcion}}</option>
                  @endforeach
                </select>
            </span>
            </div>
            <br>
            <div class="product_meta">
              <span class="relevancia">Relevancia del curso:</span>
              <input type="text" name="relevancia" id="relevancia" class="form-control" value="{{$curso->relevancia}}">
            </div>
          </div>
        </div>
      </div>
      <div class="row">
      <div class="col-md-12">
        <div class="tabs tabs-product">
          <ul class="nav nav-tabs">
            <li class="active"><a href="#descripcion" data-toggle="tab">DESCRIPCIÓN</a></li>
            <li><a href="#dirigido" data-toggle="tab">DIRIGIDO A:</a></li>
            <li><a href="#finalizado" data-toggle="tab">FINALIZADO, EL ALUMNO SERÁ CAPAZ DE:</a></li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane active" id="descripcion">
              <textarea name="descripcion" id="descripcion" class="ckeditor" rows="8" cols="80">{{$curso->descripcion}}</textarea>
            </div>
            <div class="tab-pane" id="dirigido">
              <textarea name="dirigido" id="dirigido" class="ckeditor" rows="8" cols="80" onblur="editarCampo('dirigido')">{{$curso->dirigido}}</textarea>
            </div>
            <div class="tab-pane" id="finalizado">
              <textarea name="finalizado" id="finalizado" class="ckeditor" rows="8" cols="80" onblur="editarCampo('finalizado')">{{$curso->finalizado}}</textarea>
            </div>
          </div>
        </div>
      </div>
      <a class="btn btn-success btn-icon" onclick="CKupdate();editarCampo('finalizado')">Guardar Informacion &nbsp;<i class="fa fa-floppy-o" aria-hidden="true"></i></a>
    </div>
    </form>
    <hr class="tall">
      <a class="btn btn-warning btn-lg" onclick="modalSilabo()">Subir Sílabus &nbsp;<i class="fa fa-upload" aria-hidden="true"></i></a>
    <hr class="tall">
    <h4 class="mb-md text-uppercase">Agregar <strong>Modulos</strong></h4>
    <a class="btn btn-primary btn-icon" onclick="modalModulo()">Agregar Modulo &nbsp;<i class="fa fa-plus-circle" aria-hidden="true"></i></a>
    <div class="row" id="modulosCurso">
      @include('cursos.modulos.modulos')
    </div>
    <div class="ofertas_modulos">
      @include('cursos.ofertas.ofertasEdit')
    </div>
  </div>

</div>
