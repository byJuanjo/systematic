<div class="row">
  <div class="col-lg-4">
    <label for="">Nombre</label>
    <p>{{$suscripcion->nombre}}</p>
  </div>
  <div class="col-lg-4">
    <label for="">Correo</label>
    <p>{{$suscripcion->email}}</p>
  </div>
  <div class="col-lg-4">
    <label for="">Celular</label>
    <p>{{$suscripcion->celular}}</p>
  </div>
</div>
<div class="row">
  <div class="col-lg-4">
    <label for="">Activo</label>
    <p> <?php if($suscripcion->activo=='1'){ echo 'Recibe Notificacion'; }else{ echo 'No Recibe Notificación'; } ?> </p>
  </div>
  <div class="col-lg-4">
    <label for="">Curso de Interes</label>
    <p>{{$suscripcion->cursos->titulo}}</p>
  </div>
  <div class="col-lg-4">
    <label for="">Fecha</label>
    <p>{{$suscripcion->fecha}}</p>
  </div>
</div>
<hr>
<form class="" action="#" id="frmsuscripcion" method="post">
  <div class="row">
    <div class="col-lg-3 col-md-4 col-xs-12">
      <input class="form-control" type="hidden" id="suscripcion_id" name="suscripcion_id" readonly="true" value="{{$suscripcion->id}}" >
      <label for="telemarketing">Telemarketing</label>
      <select class="form-control" name="telemarketing" id="telemarketing">
        <option value="NO" <?php if($suscripcion->telemarketing=='NO'){ ?> selected <?php } ?> >NO</option>
        <option value="SI" <?php if($suscripcion->telemarketing=='SI'){ ?> selected <?php } ?>>SI</option>
      </select>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <label for="observaciones">Observaciones</label>
      <textarea name="observaciones" id="observaciones" class="form-control" rows="4">
        {{$suscripcion->observaciones}}
      </textarea>
    </div>
  </div><br>
  <div class="row">
    <div class="form-group col-lg-12">
      <button type="button" class="btn btn-success" name="button" onclick="actualizar_suscripcion()">Actualizar Informacion</button>
    </div>
  </div>
</form>
