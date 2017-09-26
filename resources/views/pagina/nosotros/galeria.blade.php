@foreach($imagenesNosotros as $imagenesNosotro)
<li>
  <a title="{{$imagenesNosotro->ruta}}" href="/img/nosotros/{{$imagenesNosotro->imagenes->ruta}}">
    <span class="thumbnail mb-none">
      <img src="/img/nosotros/thumb/{{$imagenesNosotro->imagenes->ruta}}" alt="">
    </span>
  </a>
  @if(!Auth::guest())
    @if(Auth::user()->check3=='1')
      <i onclick="quitar_imagen_nos({{$imagenesNosotro->id}})" class="fa fa-trash-o" style="color:red" aria-hidden="true" data-toggle="tooltip" title="Elimina la imagen de la galeria"></i>
    @endif
  @endif  
</li>
@endforeach
