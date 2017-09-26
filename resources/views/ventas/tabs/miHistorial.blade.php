<button type="button" class="btn btn-success" name="button" data-toggle="tooltip" data-placement="top" title="" data-original-title="Con este boton podras ver los detalles del a venta realizada." onclick="ver_detalles_historial()">Ver detalles <i class="fa fa-info-circle" aria-hidden="true"></i></button>
&nbsp;
<button type="button" class="btn btn-warning" name="button" data-toggle="tooltip" data-placement="top" title="" data-original-title="Con este boton puedes abrir la vista de impresion en caso no pudieras imprimir el documento al generar la venta." onclick="vista_impresion()">Vista Impresion <i class="fa fa-print" aria-hidden="true"></i></button>

<input type="hidden" readonly name="ventas_hi_id" id="ventas_hi_id">
<br><br>
<section class="call-to-action featured featured-primary mb-xll" style="padding:15px">
  <div class="table-responsive">
    <table  class="table table-responsive" width="100%" id="tb_miHistorial" style="font-size:12px">
      <thead>
        <th>Id</th>
        <th>TIPO DE VENTA</th>
        <th>USUARIO</th>
        <th>CURSO</th>
        <th>PRECIO</th>
      </thead>
    </table>
  </div>
</section>
