<form class="" id="frm_pago_saldo" method="post">
  <div class="row">
    <div class="col-md-12">
      <div class="form-group">
        <label class="col-lg-3" for="precio">Restan</label>
        <div class="col-lg-9">
          <input type="hidden" name="ventas_id" id="ventas_id" value="{{$venta_id}}" class="form-control required" readonly>
          <input type="text" name="precio" id="precio" value="{{$pago[0]->saldo}}" class="form-control required" readonly>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="form-group">
        <label class="col-lg-3" for="pago">A cuenta</label>
        <div class="col-lg-9">
          <input type="text" name="acuenta" id="acuenta" class="form-control required" onkeyup="calcula_saldo_pago()">
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="form-group">
        <label class="col-lg-3" for="saldo">Saldo</label>
        <div class="col-lg-9">
          <input type="text" name="saldo" id="saldo" class="form-control required" readonly>
        </div>
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
    <div class="col-lg-12">
      <button type="button" class="btn btn-success" onclick="pagar_saldo()" name="button">Pagar</button>
    </div>
  </div>
</form>
