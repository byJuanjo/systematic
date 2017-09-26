<form class="" id="frm_oferta" method="post">
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <input type="hidden" readonly="true" class="form-control required" name="curso_id" id="curso_id" value="{{$curso_id}}">
        <label for="">Modulo 1</label>
        <select class="form-control" id="modulos_id1" name="modulos_id1">
          <option value="0">Elige un modulo</option>
          @foreach($modulos as $modulo)
          <option value="{{$modulo->id}}">{{$modulo->titulo}}</option>
          @endforeach
        </select>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <label for="modulos_id2">Modulo 2</label>
        <select class="form-control" id="modulos_id2" name="modulos_id2">
          <option value="0">Elige un modulo</option>
          @foreach($modulos as $modulo)
          <option value="{{$modulo->id}}">{{$modulo->titulo}}</option>
          @endforeach
        </select>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <label for="modulos_id3">Modulo 3</label>
        <select class="form-control" id="modulos_id3" name="modulos_id3">
          <option value="0">Elige un modulo</option>
          @foreach($modulos as $modulo)
          <option value="{{$modulo->id}}">{{$modulo->titulo}}</option>
          @endforeach
        </select>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <label for="porcentaje">Porcentaje de Descuento %</label>
        <input type="number" class="form-control" name="porcentaje" value="porcentaje">
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <button type="button" class="btn btn-success pull-right" name="button" onclick="guardarOferta()">Guardar Oferta</button>
    </div>
  </div>
</form>
