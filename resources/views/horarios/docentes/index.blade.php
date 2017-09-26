<div class="row">
  <div class="col-md-12">
  	<button type="button" class="btn btn-borders btn-default mr-xs mb-sm" onclick="verd('ddatos')">Datos</button>
  	<button type="button" class="btn btn-borders btn-success mr-xs mb-sm" onclick="verd('dagregar')">Agregar</button>
  	<button type="button" class="btn btn-borders btn-warning mr-xs mb-sm" onclick="verd('deditar')">Editar</button>
  	<button type="button" class="btn btn-borders btn-danger mr-xs mb-sm">Eliminar</button>
  </div>
</div>
  <div class="col-md-12">
    <div class="row box well">
    <div class="pestana1 ddatos" id="datosDc">
      @include('horarios.docentes.data')
    </div>
    <div class="pestana1 dagregar" style="display:none">
      @include('horarios.docentes.agregar')
    </div>
    <div class="pestana1 deditar" id="editDoc" style="display:none">
      <h3 class="text-color-tertiary">Elige un registor de la tabla para ver sus datos.</h3>
    </div>
  </div>
</div>
<script type="text/javascript">
  function verd(div_id){
    $('.pestana1').hide();
    $('.'+div_id).show();
  }
</script>
