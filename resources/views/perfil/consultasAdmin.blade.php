<?php if(count($comentarios)=='0'){ ?><center><h4 class="heading-primary">No hay consultas por responder de momento.</h4></center><?php } ?>
@foreach($comentarios as $comentario)
<ul class="list list-icons list-icons-style-2">
  <li><i class="fa fa-comment" aria-hidden="true"></i>Curso: <b>{{$comentario->cursos[0]->titulo}}</b> | Fecha: <b>{{$comentario->fecha}}</b><br>{{$comentario->descripcion}}</li>
  <li><textarea class="form-control" name="respuesta_{{$comentario->id}}" id="respuesta_{{$comentario->id}}" rows="3"></textarea></li>
  <li>
    <button class="btn btn-success" type="button" name="button" onclick="responder_consulta('#respuesta_{{$comentario->id}}','{{$comentario->id}}')">Responder</button>
    &nbsp;
    <button class="btn btn-danger" type="button" name="button" onclick="eliminar_consulta('{{$comentario->id}}')">Eliminar Comentario</button>
  </li>
</ul>
<hr>
@endforeach
