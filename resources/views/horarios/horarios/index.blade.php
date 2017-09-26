<div class="row">
  <div class="col-md-12">
  	<button type="button" class="btn btn-borders btn-default mr-xs mb-sm" onclick="verh('hdatos')">Datos</button>
  	<button type="button" class="btn btn-borders btn-success mr-xs mb-sm" onclick="verh('hagregar')">Agregar</button>
  	<button type="button" class="btn btn-borders btn-warning mr-xs mb-sm" onclick="verh('heditar')">Editar</button>
      	<button type="button" class="btn btn-borders btn-info mr-xs mb-sm" onclick="verh('hduplicar')">Duplicar</button>
  	<button type="button" class="btn btn-borders btn-danger mr-xs mb-sm">Eliminar</button>
  </div>
</div>
<div class="col-md-12">
  <div class="row box well">
    <div class="pestanah hdatos" id="datosHo">
      @include('horarios.horarios.data')
    </div>
    <div class="pestanah hagregar" id="addHor" style="display:none">
      @include('horarios.horarios.agregar')
    </div>
    <div class="pestanah heditar" id="editHor" style="display:none">
      <h3 class="text-color-tertiary">Elige un registor de la tabla para editar sus datos.</h3>
    </div>
    <div class="pestanah hduplicar" id="dupliHor" style="display:none">
      <h3 class="text-color-tertiary">Elige un registor de la tabla para duplicarlo.</h3>
    </div>
    <div class="capa">
      <div id="loader"></div>
    </div>
  </div>
</div>
<script type="text/javascript">
  function verh(div_id){
    $('.pestanah').hide();
    $('.'+div_id).show();
  }
</script>
