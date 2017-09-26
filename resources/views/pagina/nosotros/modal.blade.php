<div class="modal fade" id=imagenesNosotros tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Cargar Imagenes a Galeria</h4>
      </div>
      <div class="modal-body">
        <div class="box well">
          <form class="" action="/imgNosotros" id="frm_img_ns" method="post">
            <input type="hidden" id="token" name="_token" readonly="true" value="{{csrf_token()}}">
            <label for=""><strong>Selecciona la Imagen que quieres subir</strong></label>
            <input type="file" name="imagen" id="imagen" class="form-control required" value="">
          </form>
          <br>
          <button type="button" class="btn btn-primary pull-right" onclick="subir_imagen()">Subir Imagen</button>
        </div>
        <div class="capa">
          <div id="loader"></div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade bd-example-modal-lg" id="sec1Nosotros" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">PRIMERA SECCION NOSOTROS</h4>
      </div>
      <div class="modal-body" id="contenido_sec1">
        <div class="box well">
          <form class="" action="/frSec1Nosotros" id="frSec1Nosotros" method="post">
            <input type="hidden" id="token" name="_token" readonly="true" value="{{csrf_token()}}">
            <div class="form-group">
              <label for=""><strong>Titulo de la sección:</strong></label>
              <input type="text" name="titulo" id="titulo" size="50" value="{{$nosotros->titulo}}" />
            </div>
            <div class="form-group">
              <label for=""><strong>Coloca Aqui la descripcion de la sección.</strong></label>
              <textarea class="ckeditor" name="html" id="html" rows="10" cols="80">{!!$nosotros->html!!}</textarea>
            </div>
          </form>
          <br>
          <button type="button" class="btn btn-primary pull-right" onclick="CKupdate();actualizarSec('frSec1Nosotros')">Actualizar Informacion</button>
        </div>
        <div class="capa">
          <div id="loader"></div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade bd-example-modal-lg" id="sec2Nosotros" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">SEGUNDA SECCION NOSOTROS</h4>
      </div>
      <div class="modal-body" id="contenido_sec1">
        <div class="box well">
          <form class="" action="/frSec2Nosotros" id="frSec2Nosotros" method="post">
            <input type="hidden" id="token" name="_token" readonly="true" value="{{csrf_token()}}">
            <div class="form-group">
              <label for=""><strong>Titulo de la sección:</strong></label>
              <input type="text" name="titulo1" id="titulo1" size="50" value="{{$nosotros->titulo1}}" />
            </div>
            <div class="form-group">
              <label for=""><strong>Coloca Aqui la descripcion de la sección.</strong></label>
              <textarea class="ckeditor" name="html1" id="html1" rows="10" cols="80">{!!$nosotros->html1!!}</textarea>
            </div>
          </form>
          <br>
          <button type="button" class="btn btn-primary pull-right" onclick="CKupdate();actualizarSec('frSec2Nosotros')">Actualizar Informacion</button>
        </div>
        <div class="capa">
          <div id="loader"></div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade bd-example-modal-lg" id="sec3Nosotros" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">TERCERA SECCION NOSOTROS</h4>
      </div>
      <div class="modal-body" id="contenido_sec1">
        <div class="box well">
          <form class="" action="/frSec3Nosotros" id="frSec3Nosotros" method="post">
            <input type="hidden" id="token" name="_token" readonly="true" value="{{csrf_token()}}">
            <div class="form-group">
              <label for=""><strong>Titulo de la sección:</strong></label>
              <input type="text" name="titulo2" id="titulo2" size="50" value="{{$nosotros->titulo2}}" />
            </div>
            <div class="form-group">
              <label for=""><strong>Coloca Aqui la descripcion de la sección.</strong></label>
              <textarea class="ckeditor" name="html2" id="html2" rows="10" cols="80">{!!$nosotros->html2!!}</textarea>
            </div>
          </form>
          <br>
          <button type="button" class="btn btn-primary pull-right" onclick="CKupdate();actualizarSec('frSec3Nosotros')">Actualizar Informacion</button>
        </div>
        <div class="capa">
          <div id="loader"></div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
