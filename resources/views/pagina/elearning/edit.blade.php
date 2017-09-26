<form class="" id="frInfe" method="post">
  <input type="hidden" id="token" name="_token" readonly="true" value="{{csrf_token()}}">
  <div class="form-group">
    <label for=""><strong>Titulo de la sección:</strong></label>
      <input type="hidden" readonly="true" name="id" id="id" size="50" class="required" value="{{$elearning->id}}" />
    <input type="text" name="titulo" id="titulo" size="50" class="required" value="{{$elearning->titulo}}" />
  </div>
  <div class="form-group">
    <label for=""><strong>Imagen de la sección:</strong></label>
    <input type="file" name="img" id="img" size="50" class="form-control required" />
  </div>
  <div class="form-group">
    <label for=""><strong>Coloca Aqui la descripcion de la sección.</strong></label>
    <textarea class="ckeditor" name="html" id="html" rows="10"  class="required" cols="80">{{$elearning->html}}</textarea>
  </div>
</form>
<br>
<button type="button" class="btn btn-primary pull-right" onclick="CKupdate();actualizarInf('frInfe')">Actualizar Informacion</button>
