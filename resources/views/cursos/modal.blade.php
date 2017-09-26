<div class="modal fade bd-example-modal" id="subirImagenesMd" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Subir Imagenes</h4>
      </div>
      <div class="modal-body">
        <div class="box well" id="imagenesCurso">
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
<div class="modal fade bd-example-modal" id="crearModuloMd" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Crear Modulos</h4>
      </div>
      <div class="modal-body">
        <div class="box well" id="moduloCurso">
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

<div class="modal fade bd-example-modal" id="editModuloMd" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Editar Modulos</h4>
      </div>
      <div class="modal-body">
        <div class="box well" id="editModulo">
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

<div class="modal fade bd-example-modal" id="crearSilaboMd" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Subir Sílabo</h4>
      </div>
      <div class="modal-body">
        <div class="box well" id="SilaboCurso"></div>
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


<div class="modal fade bd-example-modal" id="iniciarSession" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Inicia Sesion</h4>
      </div>
      <div class="modal-body">
        <div class="box well">
          <form class="form-horizontal" role="form" method="POST" action="/login">
          <input type="hidden" id="token" name="_token" readonly="true" value="csDTuhPZaTBdDSsdsTXdaqhMy5yXBsx0717rLmHX">
          <div class="form-group">
            <label for="email" class="col-md-4 control-label">Correo</label>
            <div class="col-md-6">
              <input id="email" type="email" class="form-control" name="email" value="">
            </div>
          </div>
          <div class="form-group">
            <label for="password" class="col-md-4 control-label">Contraseña</label>
            <div class="col-md-6">
              <input id="password" type="password" class="form-control" name="password">
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
              <div class="checkbox">
                <label>
                  <input type="checkbox" name="remember"> Recuerdame
                </label>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
              <button type="submit" class="btn btn-primary">
                <i class="fa fa-btn fa-sign-in"></i> Ingresar
              </button>
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
              <a class="btn btn-link" href="/login">Eres nuevo?, Registrate</a>
            </div>
            <div class="col-md-6 col-md-offset-4">
              <a class="btn btn-link" href="/password/reset">Olvidaste tu contraseña?</a>
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
<div class="modal fade bd-example-modal" id="agregarofertasMd" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Mantenimiento de Ofertas para este curso</h4>
      </div>
      <div class="modal-body">
        <div class="box well" id="AddOfertas">
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
