<form class="" id="frInf" method="post">
  <input type="hidden" id="token" name="_token" readonly="true" value="{{csrf_token()}}">
  <div class="form-group">
    <label for=""><strong>Titulo de la sección:</strong></label>
      <input type="hidden" readonly="true" name="id" id="id" size="50" class="required" value="{{$infraestructura->id}}" />
    <input type="text" name="titulo" id="titulo" size="50" class="required" value="{{$infraestructura->titulo}}" />
  </div>
  <div class="form-group">
    <label for=""><strong>Coloca Aqui la descripcion de la sección.</strong></label>
    <textarea class="ckeditor" name="html" id="html" rows="10"  class="required" cols="80">{{$infraestructura->html}}</textarea>
  </div>
</form>
<br>
<button type="button" class="btn btn-primary pull-right" onclick="CKupdate();actualizarInf('frInf')">Actualizar Informacion</button>
