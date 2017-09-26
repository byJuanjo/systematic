<div class="row">
  <div class="col-lg-12">
    <form id="frm_silabo_curso" method="post" accept-charset="UTF-8" enctype="multipart/form-data">
      <div class="form-group">
        <label for="">Cargar Sílabu del curso (PDF)</label>
        <input type="hidden" id="token" name="_token" readonly="true" value="{{csrf_token()}}">
        <input type="hidden"  readonly="true" class="form-control" c name="curso_id" id="curso_id" value="{{$curso_id}}">
        <input type="file" class="form-control required" name="file" id="file" value="">
      </div>
      <button type="button" name="button" class="btn btn-primary" onclick="cargar_silabo_curso()">Subir Sílabu</button>
    </form>
  </div>
</div>
