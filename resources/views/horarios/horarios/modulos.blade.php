<?php if(count($modulos)==0){ ?>
  <option value="0">ESTE CURSO NO CUENTA CON MODULOS</option>
<?php }else{ ?>
  <option value="">Elige un modulo del curso seleccionado.</option>
  @foreach($modulos as $modulo)
  <option value="{{$modulo->id}}">{{$modulo->titulo}} </option>
  @endforeach
<?php } ?>
