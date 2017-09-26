<div role="main" class="main shop">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h1 class="mb-none"><strong>Tienda</strong></h1>
        <ul class="nav nav-pills sort-source" data-sort-id="portfolio" data-option-key="filter">
          <li data-option-value="*" class="active"><a href="#">Ver Todos</a></li>
          @foreach($tipos as $tipo)
          <li data-option-value=".{{$tipo->descripcion}}" ><a href="#">{{$tipo->descripcion}}</a></li>
          @endforeach
        </ul>
      </div>
    </div>
    <hr>
    <div class="row">
      <ul class="image-gallery sort-destination lightbox products product-thumb-info-list" data-plugin-masonry data-sort-id="portfolio" data-plugin-options='{"delegate": "a.lightbox-portfolio", "type": "image", "gallery": {"enabled": true}}'>
        @foreach($cursos as $curso)
        <li class="col-md-3 col-sm-6 col-xs-6 product {{$curso->tipos->descripcion}}">
          <?php if($curso->bolita!='Desactivado'){ ?>
            <a href="/cursos/{{$curso->id}}">
              <span class="onsale">{{$curso->bolita}}</span>
            </a>
          <?php } ?>
          <span class="product-thumb-info">
            <a href="/carrito.cursos/{{$curso->id}}" class="add-to-cart-product">
              <span><i class="fa fa-shopping-cart"></i> Agregar al carrito</span>
            </a>
            <a href="/cursos/{{$curso->id}}">
              <span class="product-thumb-info-image">
                <span class="product-thumb-info-act">
                  <span class="product-thumb-info-act-left"><em>Ver</em></span>
                  <span class="product-thumb-info-act-right"><em><i class="fa fa-plus"></i> detalles</em></span>
                </span>
                <?php if(!isset($curso->imagenes[0])){ ?>
                  <img alt="" class="img-responsive" src="/img/cursos/profile_curso.jpg">
                <?php }else{ ?>
                  <img alt="" class="img-responsive" src="/img/cursos/{{$curso->imagenes[0]->ruta}}">
                <?php } ?>
              </span>
            </a>
            <span class="product-thumb-info-content">
              <a href="/cursos/{{$curso->id}}">
                <h4>{{$curso->titulo}}</h4>
                <h6>{{$curso->categorias->descripcion}}</h6>
                <p style="display:none">Es la hoja de cálculo de mayor demanda en el ámbito, estudiantil, laboral y profesional.</p>
                <span class="price">
                  <?php if($curso->tipo_desc==''){ ?>
                    <span class="amount">S/.{{$curso->precio1}}</span>
                  <?php
                    }else{
                      $precio=intval($curso->precio1); $tipo_desc=$curso->tipo_desc; $monto_desc=intval($curso->monto_desc);
                      if($tipo_desc=='porcentaje'){
                        $saldo=($precio*$monto_desc)/100;
                        $descuento=$precio-intval($saldo);
                      }else if($tipo_desc=='monto'){
                        $descuento=intval($precio)-intval($monto_desc);
                    }	?>
                    <del style="color:#cccccc;"><span class="amount" >S/.{{$curso->precio1}}</span></del>
                    <span class="amount">S/.<?php echo  number_format($descuento, 2, '.', ' '); ?></span>
                  <?php } ?>
                </span>
              </a>
            </span>
          </span>
        </li>
        @endforeach
      </ul>
    </div>
    <div class="row" style="display:none">
      <div class="col-md-12">
        <ul class="pagination pull-right">
          <li><a href="#"><i class="fa fa-chevron-left"></i></a></li>
          <li class="active"><a href="#">1</a></li>
          <li><a href="#">2</a></li>
          <li><a href="#">3</a></li>
          <li><a href="#"><i class="fa fa-chevron-right"></i></a></li>
        </ul>
      </div>
    </div>
  </div>
</div>
