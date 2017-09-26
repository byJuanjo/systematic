<header id="header" data-plugin-options='{"stickyEnabled": true, "stickyEnableOnBoxed": true, "stickyEnableOnMobile": true, "stickyStartAt": 57, "stickySetTop": "-57px", "stickyChangeLogo": true}'>
  <div class="header-body">
    <div class="header-container container">
      <div class="header-row">
        <div class="header-column">
          <div class="header-logo">
            <a href="/">
              <img alt="Systematic" width="252" height="65" data-sticky-width="209" data-sticky-height="54" data-sticky-top="25" src="/img/logo.png">
            </a>
          </div>
        </div>
        <div class="header-column">
          <div class="header-row">
            <div class="header-search">
              <form id="searchForm" action="/buscador" method="get">
                <div class="input-group">
                  <input type="text" class="form-control" name="q" id="q" placeholder="Buscar cursos..." required>
                  <span class="input-group-btn">
                    <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
                  </span>
                </div>
              </form>
            </div>
            <nav class="header-nav-top">
              <ul class="nav nav-pills">
                <li class="hidden-xs">
                  @if(!Auth::guest())
                    <a href="/perfil"><i class="fa fa-angle-right"></i> Admin</a>
                  @else
                    <a href="/auth/login"><i class="fa fa-angle-right"></i> Admin</a>
                  @endif
                </li>
                <li class="hidden-xs">
                  <a href="/contacto"><i class="fa fa-angle-right"></i> Contactos</a>
                </li>
                <li class="hidden-xs">
                  <span class="ws-nowrap"><i class="fa fa-phone"></i> (056) 237-712</span>
                </li>
              </ul>
            </nav>
          </div>
          <div class="header-row">
            <div class="header-nav">
              <button class="btn header-btn-collapse-nav" data-toggle="collapse" data-target=".header-nav-main">
                <i class="fa fa-bars"></i>
              </button>
              <ul class="header-social-icons social-icons hidden-xs">
                <li class="social-icons-facebook"><a href="https://web.facebook.com/esystematic/?ref=br_rs" target="_blank" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                <li class="social-icons-twitter"><a href="https://twitter.com/Systematic_edu" target="_blank" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                <li class="social-icons-youtube"><a href="https://www.youtube.com/user/systematic273" target="_blank" title="Linkedin"><i class="fa fa-youtube-play"></i></a></li>
              </ul>
              <div class="header-nav-main header-nav-main-effect-1 header-nav-main-sub-effect-1 collapse">
                <nav>
                  <ul class="nav nav-pills" id="mainNav">
                    <li class="dropdown active">
                      <a class="dropdown-toggle" href="/">
                        Nosotros
                      </a>
                      <ul class="dropdown-menu">
                        <li><a href="/nosotros">¿Quiénes somos?</a></li>
                        <li><a href="/infraestructura">Infraestructura</a></li>
                        <li><a href="/certiport">Certiport</a></li>
                        <li><a href="/elearning">E-learning</a></li>
                        <li><a href="/valores">Valor Agregado</a></li>
                      </ul>
                    </li>
                    <li class="dropdown dropdown-mega">
                      <a class="dropdown-toggle" href="#">
                        Cursos
                      </a>
                      <ul class="dropdown-menu">
                        @if(!Auth::guest())
                          @if(Auth::user()->check4=='1')
                            <ul class="dropdown-mega-sub-nav">
                              <div class="col-md-6">
                                <li><a href="/newCurso">AGREGAR NUEVO CURSO</a></li>
                              </div>
                              <div class="col-md-6">
                                <li><a href="/promociones">PROMOCIONES</a></li>
                              </div>
                            </ul>
                          @endif
                        @endif
                        <br>
                          <div class="dropdown-mega-content">
                            <div class="row">
                              @foreach($categorias as $categoria)
                              <div class="col-md-3">
                                <span class="dropdown-mega-sub-title">{{$categoria->descripcion}}</span>
                                <ul class="dropdown-mega-sub-nav">
                                  @foreach($cursos as $curso)
                                  <?php
                                    if($curso->categorias_id==$categoria->id){
                                  ?>
                                  <li><a href="/cursos/{{$curso->id}}">{{$curso->titulo}}</a></li>
                                  <?php
                                    }
                                   ?>
                                  @endforeach
                                </ul>
                              </div>
                              @endforeach
                            </div>
                          </div>
                        </li>
                      </ul>
                    </li>
                    <li class="">
                      <a class="" href="/horarios">Horarios</a>
                    </li>
                    <li class="">
                      <a class="" href="#"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Mi Carrito</a>
                    </li>
                    @if(Auth::guest())
                    <li class="">
                      <a class="" href="/auth/login"><i class="fa fa-user" aria-hidden="true"></i> Inicia / Registrate</a>
                    </li>
                    @else
                      <li class="dropdown">
                        <a class="dropdown-toggle" href="#">
                          <i class="fa fa-user" aria-hidden="true"></i> {{Auth::user()->name}}
                        </a>
                        <ul class="dropdown-menu">
                          <li>
                            <a href="/perfil"><i class="fa fa-book" aria-hidden="true"></i> Mi Perfil</a>
                          </li>
                          <?php if(Auth::user()->tipo==1){ ?>
                            <li>
                              <a href="/ventas"><i class="fa fa-cart-plus" aria-hidden="true"></i> Ventas</a>
                            </li>
                          <?php } ?>
                          <li>
                            <a href="{{ url('/auth/logout') }}"><i class="fa fa-sign-out" aria-hidden="true"></i> Cerrar Session</a>
                          </li>
                        </ul>
                      </li>
                    @endif
                    </li>
                  </ul>
                </nav>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>
