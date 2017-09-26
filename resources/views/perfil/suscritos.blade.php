<button type="button" class="btn btn-success" name="button" data-toggle="tooltip" data-placement="top" title="" data-original-title="Con este boton podras exportar toda la base de datos de suscritos del sistema" onclick="exportar_suscritos()">Exportar a Excel <i class="fa fa-file-excel-o" aria-hidden="true"></i></button>
&nbsp;
<button type="button" class="btn btn-warning" name="button" data-toggle="tooltip" data-placement="top" title="" data-original-title="Con este boton puedes actualizar la informacion de los suscritos." onclick="actualizar_informacion()">Actualizar Informacion <i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
&nbsp;
<button type="button" class="btn btn-primary" name="button" data-toggle="tooltip" data-placement="top" title="" data-original-title="Con este boton puedes actualizar la informacion de los suscritos." onclick="telemarketing_update()">Telemarketing <i class="fa fa-check" aria-hidden="true"></i></button>
<input type="hidden" readonly name="suscripcion_id" id="suscripcion_id">
<br><br>
<section class="call-to-action featured featured-primary mb-xll" style="padding:15px">
  <div class="table-responsive">
    <table  class="table table-responsive" width="100%" id="tb_suscritos" style="font-size:12px">
      <thead>
        <th>Id</th>
        <th>Nombre</th>
        <th>Correo</th>
        <th>Celular</th>
        <th>Activo</th>
        <th>Curso Interes</th>
        <th>Fecha</th>
        <th>Telemarketing</th>
        <th>Observaciones</th>

      </thead>
    </table>
  </div>
</section>
