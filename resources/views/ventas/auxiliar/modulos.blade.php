<?php if(count($modulos)==0){ ?>
  <option value="">No existen modulos actualmente</option>
<?php }else{ ?>
  <option value="">Elige un modulo</option>
  @foreach($modulos as $modulo)
  <option value="{{$modulo->id}}">{{$modulo->titulo}}</option>
  @endforeach

<?php } ?>
