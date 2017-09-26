<div class="row">
  <div class="col-md-12">
  	<button type="button" class="btn btn-borders btn-default mr-xs mb-sm" onclick="ver('datos')">Datos</button>
  	<button type="button" class="btn btn-borders btn-success mr-xs mb-sm" onclick="ver('agregar')">Agregar</button>
  	<button type="button" class="btn btn-borders btn-warning mr-xs mb-sm" onclick="ver('editar')">Editar</button>
  	<button type="button" class="btn btn-borders btn-danger mr-xs mb-sm">Eliminar</button>
  </div>
</div>
<div class="col-md-12">
  <div class="row box well">
    <div class="pestana datos" id="datosLb">
      @include('horarios.laboratorios.data')
    </div>
    <div class="pestana agregar" style="display:none">
      @include('horarios.laboratorios.agregar')
    </div>
    <div class="pestana editar" id="editLab" style="display:none">
      <h3 class="text-color-tertiary">Elige un registor de la tabla para ver sus datos.</h3>
    </div>
    <div class="capa">
      <div id="loader"></div>
    </div>
  </div>
</div>
<script type="text/javascript">
  function ver(div_id){
    $('.pestana').hide();
    $('.'+div_id).show();
  }
</script>
