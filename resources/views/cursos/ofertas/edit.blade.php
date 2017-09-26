<form class="" id="frm_oferta_edit" method="post">
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <label for="porcentaje">Porcentaje de Descuento %</label>
        <input type="hidden" readonly class="form-control" name="oferta_id" id="oferta_id" value="{{$oferta->id}}">
        <input type="number" class="form-control" name="porcentaje" id="porcentaje" value="{{$oferta->porcentaje}}">
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <label for="porcentaje">Visible</label>
        <select class="form-control" name="activo" id="activo">
          <option <?php if($oferta->activo=='SI'){ ?> selected <?php } ?> value="SI">SI</option>
          <option <?php if($oferta->activo=='NO'){ ?> selected <?php } ?> value="NO">NO</option>
        </select>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <button type="button" class="btn btn-warning pull-right" name="button" onclick="updateOferta()">Actualizar Oferta</button>
    </div>
  </div>
</form>
