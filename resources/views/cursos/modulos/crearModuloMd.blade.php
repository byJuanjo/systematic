<form class="" id="frm_modulo" method="post">
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <label for="">Titulo</label>
        <input type="hidden" id="token" name="_token" readonly="true" value="{{csrf_token()}}">
        <input type="text" class="form-control" name="titulo" id="titulo">
        <input type="hidden" readonly="true" class="form-control required" name="curso_id" id="curso_id" value="{{$curso_id}}">
        <input type="hidden" readonly="true" class="form-control " name="modulo_id" id="modulo_id" value="">
      </div>
    </div>
    <div class="col-md-2">
      <div class="form-group">
        <label for="">Precio</label>
        <input type="number" class="form-control required" name="precio" id="precio">
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group">
        <label for="">Subir Portada</label>
        <input type="file" class="form-control required" name="imagen" id="imagen">
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <button type="button" name="button" id="btn_modulo" class="btn btn-primary" onclick="crearModulo()">Crear Modulo</button>
    </div>
  </div>
</form>
<div class="caracteristicasAdd" style="display:none">
  <p class="heading-primary">Agregar las descripcion del modulo</p>
  <form class="" id="frm_modulo_caracteristica" method="post">
    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <label for="">Titulo</label>
          <input type="hidden" id="token" name="_token" readonly="true" value="{{csrf_token()}}">
          <input type="text" class="form-control required" name="titulo" id="titulo">
          <input type="hidden" readonly="true" class="form-control" name="modulo_id1" id="modulo_id1" value="{{$curso_id}}">
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <label for="">Descripcion</label><br>
          <textarea name="descripcion" id="descripcion_mod" class="ckeditor required" rows="8" cols="80" ></textarea>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <button type="button" name="button" class="btn btn-primary" onclick="crearCaracteristicaModulo()">Agregar Caracteristica</button>
      </div>
    </div>
  </form>
</div>
<br>
<hr><hr>
<div id="showCaracteristicas">

</div>
