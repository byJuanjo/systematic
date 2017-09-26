<div class="row">
  <div class="col-lg-12">
    <form class="" action="index.html" id="frm_imagen" method="post">
      <div class="form-group">
        <label for="">Subir Imagen al curso</label>
        <input type="hidden" id="token" name="_token" readonly="true" value="{{csrf_token()}}">
        <input type="hidden"  readonly="true" class="form-control" c name="curso_id" id="curso_id" value="{{$curso_id}}">
        <input type="file" class="form-control" name="imagen" id="imagen" value="">
      </div>
      <button type="button" name="button" class="btn btn-primary" onclick="cargar_imagen_curso()">Subir Imagen</button>
    </form>
  </div>
</div>
<hr>
<div id="modalImagen">
  <div class="row">
    <?php if(count($imagenes)==0){ ?>
      <div class="col-sm-12">
        <p>Aun no hay imagenes cargadas.</p>
      </div>
     <?php } ?>
    @foreach($imagenes as $imagen)
    <div class="col-sm-3 col-xs-6">
      <span class="thumb-info thumb-info-hide-wrapper-bg mb-xlg">
        <span class="thumb-info-wrapper">
          <img src="/img/cursos/{{$imagen->ruta}}" style="widht:100px;height:100px">
        </span>
        <span class="thumb-info-caption">
          <span class="thumb-info-social-icons">
            <a onclick="quitarImagenCurso('{{$imagen->id}}','{{$curso_id}}')" style="background:#e36159;"><i class="fa fa-times" aria-hidden="true"></i><span>Eliminar</span></a>
          </span>
        </span>
      </span>
    </div>
    @endforeach
  </div>

</div>
