<ul class="products product-thumb-info-list">
  <?php if(count($modulos)==0){ ?>
    <li class="col-sm-12  product">
      <p>Aún no hay modulos creados para este curso.</p>
    </li>
  <?php  } ?>
  @foreach($modulos as $modulo)
  <li class="col-sm-3 col-xs-12 product">
    <span class="product-thumb-info">
      <a href="/modulo/{{$modulo->id}}" class="add-to-cart-product">
        <span><i class="fa fa-shopping-cart"></i> Agregar al Carrito</span>
      </a>
      <a href="/modulo/{{$modulo->id}}">
        <span class="product-thumb-info-image">
          <span class="product-thumb-info-act">
            <span class="product-thumb-info-act-left"><em>Ver</em></span>
            <span class="product-thumb-info-act-right"><em><i class="fa fa-plus"></i> detalles</em></span>
          </span>
          <img alt="" class="img-responsive" src="/img/cursos/{{$modulo->ruta}}">
        </span>
      </a>
      <span class="product-thumb-info-content">
        <a href="/modulo/{{$modulo->id}}">
          <h4>{{$modulo->titulo}}</h4>
          <span class="price">
            S/.<span class="amount">{{$modulo->precio}}</span>
          </span>
        </a>
      </span>
      <div class="row thumb-info-social-icons">
          <div class="col-lg-6 col-xs-6" style="margin-bottom:5px">
            <a onclick="editarModulo('{{$modulo->id}}')" style="background:#ed9c28;cursor:pointer" data-toggle="tooltip" title="Editar registro"><i class="fa fa-pencil-square-o" aria-hidden="true"></i><span>Editar</span></a>
          </div>
          <div class="col-lg-6 col-xs-6" style="margin-bottom:0px">
            <a onclick="eliminarModulo('{{$modulo->id}}')" style="background:#e36159;cursor:pointer" data-toggle="tooltip" title="Elimina este servicio"><i class="fa fa-times" aria-hidden="true"></i><span>Eliminar</span></a>
          </div>
        </div>
    </span>
  </li>
  @endforeach

</ul>
