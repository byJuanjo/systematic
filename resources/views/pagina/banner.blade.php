<form class="" id="banner_form" method="post">
  <div class="row">
    <div class="col-lg-12">
      <div class="form-group">
        <label for="tipo"><strong>TIPO DE BANNER:</strong></label>
        <select class="form-control" id="tipo" name="tipo">
          <option <?php if($banner->tipo=='IMAGEN'){ ?> SELECTED <?php } ?> value="IMAGEN">IMAGEN</option>
          <option <?php if($banner->tipo=='VIDEO'){ ?> SELECTED <?php } ?> value="VIDEO">VIDEO</option>
        </select>
      </div>
      <div class="form-group">
        <label for="textoa1"><strong>Primer Texto (PRIMERA IMAGEN Y VIDEO):</strong></label>
        <input type="hidden" name="id" id="id" value="{{$banner->id}}" class="form-control">
        <input type="hidden" id="token" name="_token" readonly="true" value="{{csrf_token()}}">
        <input type="text" name="textoa1" id="textoa1" value="{{$banner->textoa1}}" class="form-control">
      </div>
      <div class="form-group">
        <label for="textoa2"><strong>Segundo Texto (PRIMERA IMAGEN Y VIDEO):</strong></label>
        <input type="text" name="textoa2" id="textoa2" value="{{$banner->textoa2}}" class="form-control">
      </div>
      <div class="form-group">
        <label for="textoa3"><strong>Tercer Texto (PRIMERA IMAGEN Y VIDEO):</strong></label>
        <input type="text" name="textoa3" id="textoa3" value="{{$banner->textoa3}}" class="form-control">
      </div>
      <div class="form-group">
        <label for="textoboton"><strong>Texto de Boton (PRIMERA IMAGEN Y VIDEO):</strong></label>
        <input type="text" name="textoboton" id="textoboton" value="{{$banner->textoboton}}" class="form-control">
      </div>
      <hr>
      <div class="form-group">
        <label for="textob1"><strong>Primer Texto (SEGUNDA IMAGEN):</strong></label>
        <input type="text" name="textob1" id="textob1" value="{{$banner->textob1}}" class="form-control">
      </div>
      <div class="form-group">
        <label for="textob2"><strong>Segundo Texto (SEGUNDA IMAGEN):</strong></label>
        <input type="text" name="textob2" id="textob2" value="{{$banner->textob2}}" class="form-control">
      </div>
      <div class="form-group">
        <label for="textob3"><strong>Tercer Texto (SEGUNDA IMAGEN):</strong></label>
        <input type="text" name="textob3" id="textob3" value="{{$banner->textob3}}" class="form-control">
      </div>
      <hr>
      <div class="form-group">
        <label for="imagen1"><strong>PRIMERA IMAGEN: </strong>({{$banner->imagen1}})</label>
        <input type="file" name="imagen1" id="imagen1"  class="form-control">
      </div>
      <div class="form-group">
        <label for="imagen2"><strong>SEGUNDA IMAGEN: </strong>({{$banner->imagen2}})</label>
        <input type="file" name="imagen2" id="imagen2"  class="form-control">
      </div>
      <div class="form-group">
        <label for="video"><strong>VIDEO: </strong>({{$banner->video}})</label>
        <input type="file" name="video" id="video" class="form-control">
      </div>
      <div class="form-group">
        <button type="button" class="btn btn-success" name="button" onclick="actualizarBanner()">ACTUALIZAR BANNER</button>
      </div>
    </div>
  </div>

</form>
