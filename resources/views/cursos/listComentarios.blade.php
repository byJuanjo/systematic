<?php if(count($comentarios)==0){ ?>
  <h6 class="heading-primary"><center>Aún no hay comentario en este curso.</center></h6>
<?php }else{ ?>
  @foreach($comentarios as $comentario)
    <ul class="list list-icons list-icons-style-2">
      <li><i class="fa fa-comment" aria-hidden="true"></i><b> {{$comentario->descripcion}}</b></li>
      <?php if($comentario->respuesta!=''){ ?>
        <li><i class="fa fa-comment-o" aria-hidden="true"></i> {{$comentario->respuesta}}</li>
      <?php } ?>
    </ul>
    <hr>
  @endforeach
<?php } ?>
