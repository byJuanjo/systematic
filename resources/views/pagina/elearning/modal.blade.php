<div class="modal fade bd-example-modal-lg" id="AddInf" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">AGREGAR SECCION DE E-LEARING</h4>
      </div>
      <div class="modal-body" id="cont_inf">
        <div class="box well" id="contend_img">
          <form class="" id="frInfAdd" method="post">
            <input type="hidden" id="token" name="_token" readonly="true" value="{{csrf_token()}}">
            <div class="form-group">
              <label for=""><strong>Titulo de la sección:</strong></label>
              <input type="text" name="titulo_add" id="titulo_add" size="50" class="required" value="" />
            </div>
            <div class="form-group">
              <label for=""><strong>Imagen de la sección:</strong></label>
              <input type="file" name="img" id="img" size="50" class="form-control required" value="" />
            </div>
            <div class="form-group">
              <label for=""><strong>Coloca Aqui la descripcion de la sección.</strong></label>
              <textarea class="ckeditor" name="html_add" id="html_add" rows="10"  class="required" cols="80"></textarea>
            </div>
          </form>
          <br>
          <button type="button" class="btn btn-primary pull-right" onclick="CKupdate();crearInf('frInf')">Crear Seccion</button>
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

<div class="modal fade bd-example-modal-lg" id="EditInf" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">EDITAR SECCION INFRAESTRUCTURA</h4>
      </div>
      <div class="modal-body" id="cont_inf">
        <div class="box well" id="contend_edit">

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
