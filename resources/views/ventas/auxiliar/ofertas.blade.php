<?php if(count($ofertas)==0){ ?>
  <option value="">No existen ofertas actualmente</option>
<?php }else{ ?>
  <option value="">Elige una oferta</option>
  <?php $numoferta=1; ?>
  @foreach($ofertas as $ofertas)
  <option value="{{$ofertas->id}}">Oferta {{$numoferta}}</option>
  <?php $numoferta+=1; ?>
  @endforeach
<?php } ?>
