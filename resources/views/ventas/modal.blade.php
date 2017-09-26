<div class="modal fade bd-example-modal" id="new_user" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Nuevo Usuario</h4>
      </div>
      <div class="modal-body">
        <div class="box well" id="nuevo_user">
          <form class="" id="fr_newUser" method="post">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="documento">DNI</label>
                  <input type="text" class="form-control required" readonly name="new_documento" id="new_documento">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="name">Nombre</label>
                  <input type="text" class="form-control required" name="new_name" id="new_name">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="apellido">Apellido</label>
                  <input type="text" class="form-control required" name="new_apellido" id="new_apellido">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="email">Correo</label>
                  <input type="text" class="form-control required" name="new_email" id="new_email" onblur="validar_newcorreo()">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="celular">Celular</label>
                  <input type="text" class="form-control required" name="new_celular" id="new_celular">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <button class="btn btn-success" type="button" name="button" onclick="crear_user()">Crear Nuevo Usuario</button>
              </div>
            </div>
          </form>
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
<div class="modal fade bd-example-modal" id="detallesHistorial" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Detalles de Ventas</h4>
      </div>
      <div class="modal-body">
        <div class="box well" id="contentHistory">
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
<div class="modal fade bd-example-modal" id="new_pago" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Realizar Pago</h4>
      </div>
      <div class="modal-body">
        <div class="box well" id="nuevo_pago">

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

<div class="modal fade bd-example-modal" id="asigHorario" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Realizar Pago</h4>
      </div>
      <div class="modal-body">
        <div class="box well" id="asigHorario_content">

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
