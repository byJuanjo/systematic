<form class="" id="frm_individual" method="post">
  <div class="row">
    <div class="col-md-3">
      <div class="form-group">
        <label for="dni">DNI</label>
        <input type="number" class="form-control required" name="dni" id="dni" onblur="buscar_user()">
        <input type="hidden" class="form-control required" name="vendedor_id" id="vendedor_id" value="{{ Auth::user()->id }}">
      </div>
    </div>
    <div class="col-md-9 well" id="user_data">
      <h3 style="margin-bottom:0px">Para realizar una venta digita primero el DNI.</h3>
      <input type="hidden" class="form-control required" name="user_id" id="user_id" value="">

    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <div class="row">
        <div class="col-md-12">
            <div class="form-group">
              <label for="dni">Elige un Curso</label>
              <select class="form-control required" name="cursos_id" id="cursos_id" onchange="buscar_horarios()">
                <option value="">Elige un Curso</option>
                @foreach($cursos as $curso)
                <option value="{{$curso->id}}">{{$curso->titulo}}</option>
                @endforeach
              </select>
            </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
            <div class="form-group">
              <label for="dni">Modulos</label>
              <select class="form-control" name="modulos_id" id="modulos_id" onchange="buscar_modulos()">
                <option value="">Elige un Curso primero ↑ ↑ ↑</option>
              </select>
            </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
            <div class="form-group">
              <label for="dni">Ofertas</label>
              <select class="form-control" name="ofertas_id" id="ofertas_id" onchange="buscarOfertas()">
                <option value="">Elige un Curso primero ↑ ↑ ↑</option>
              </select>
            </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="form-group">
            <label for="dni">Precio</label>
            <input type="number" class="form-control required" name="precio" id="precio" readonly>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="dni">A cuenta</label>
            <input type="number" class="form-control required" name="acuenta" onkeyup="calcula_saldo()" id="acuenta">
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="dni">Saldo</label>
            <input type="number" class="form-control" name="saldo" id="saldo" readonly>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="fecha">Fecha</label>
            <input type="date" class="form-control required" name="fecha" id="fecha" value="{{$inicio}}">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="dni">Tipo de Documento</label>
            <select class="form-control required" name="tipo_doc" id="tipo_doc">
              <option value="BOLETA DE VENTA">BOLETA DE VENTA</option>
              <option value="BOLETA DE VENTA">FACTURA</option>
            </select>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="num_documento">Numero de Documento</label>
            <input type="text" class="form-control required" name="num_documento" id="num_documento">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <button type="button" class="btn btn-success" name="button" onclick="guardar_venta()">Guardar Venta <i class="fa fa-hdd-o" aria-hidden="true"></i></button>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="row">
        <div class="col-md-12" id="div_horario">

        </div>
      </div>
      <div class="row">
        <div class="col-md-12" id=div_oferta>

        </div>
      </div>
    </div>
  </div>

</form>
