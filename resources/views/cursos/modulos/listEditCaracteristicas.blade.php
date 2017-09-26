@foreach($caracteristicas as $caracteristica)
<form class="" id="frm_modulo_editcaracteristica{{$caracteristica->id}}" method="post">
  <div class="row">
    <div class="col-md-12">
      <div class="form-group">
        <label for="">Titulo</label>
        <input type="hidden" id="token" name="_token" readonly="true" value="{{csrf_token()}}">
        <input type="text" class="form-control required" name="titulo" id="titulo" value="{{$caracteristica->titulo}}">
        <input type="hidden" readonly="true" class="form-control" name="caracteristica_id" id="caracteristica_id" value="{{$caracteristica->id}}">
      </div>
    </div>
    <div class="col-md-12">
      <div class="form-group">
        <label for="">Descripcion</label><br>
        <textarea name="descripcion" id="descripcion_mod{{$caracteristica->id}}" class="ckeditor required" rows="8" cols="80" >{!!$caracteristica->descripcion!!}</textarea>
        <script>
        CKEDITOR.replace('descripcion_mod{{$caracteristica->id}}');
        </script>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <button type="button" name="button" class="btn btn-primary" onclick="editarCaracteristicaModulo('frm_modulo_editcaracteristica{{$caracteristica->id}}')">Editar Caracteristica</button>
      <button type="button" name="button" class="btn btn-danger" onclick="quitarCaracteristicaModulo({{$caracteristica->id}})">Eliminar Caracteristica</button>
    </div>
  </div>
  <div class="row">
    <hr>
  </div>
</form>
@endforeach
