<!DOCTYPE html>
<html>
	<head>
    @include('layouts.partials.scripts')
  </head>
  <body>
    <div class="body">
      @include('layouts.partials.header')
      <div role="main" class="main">
        <section class="page-header">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <ul class="breadcrumb">
                  <li><a href="/">Inicio</a></li>
                  <li class="active">Contactanos</li>
                </ul>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <h1>Contactanos</h1>
              </div>
            </div>
          </div>
        </section>
        <!-- Google Maps - Go to the bottom of the page to change settings and map location. -->
				<div id="googlemaps" class="google-map"></div>
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <form id="contactForm">
								<h4 class="heading-primary mt-lg"><strong>Suscribete</strong></h4>
								<p>Si deseas recibir las mejores noticias, promociones de Systematic, suscribete a nuestro boletin de correos.</p>
								<hr>
                <div class="row">
                  <div class="form-group">
                    <div class="col-md-6">
                      <label>Tu nombre</label>
								      <input type="hidden" id="token" name="_token" readonly="true" value="{{csrf_token()}}">
                      <input type="text" value="" maxlength="100" class="form-control" name="nombre" id="nombre" >
                    </div>
                    <div class="col-md-6">
                      <label>Tu correo *</label>
                      <input type="email" value="" maxlength="100" class="form-control " name="email" id="email" required>
                    </div>
                  </div>
                </div>
								<div class="row">
									<div class="form-group">
										<div class="col-md-6">
											<label>Celular</label>
											<input type="tel" value="" maxlength="100" class="form-control" name="celular" id="celular">
										</div>
										<div class="col-md-6">
											<label>Curso de Interes</label>
											<select class="form-control" id="cursos_id" name="cursos_id">
												<option value="">Elige un curso de Interes</option>
												@foreach($cursos as $curso)
												<option value="{{$curso->id}}">{{$curso->titulo}}</option>
												@endforeach
											</select>
										</div>
									</div>
								</div>
              </form>
							<div class="row">
								<div class="col-md-12">
									<button class="btn btn-primary btn-lg mb-xlg" onclick="suscribirse('#contactForm')">Suscribirse!</button>
								</div>
							</div>
            </div>
            <div class="col-md-6">
              <h4 class="heading-primary">Nuestros <strong>Datos</strong></h4>
              <ul class="list list-icons list-icons-style-3 mt-xlg">
                <li><i class="fa fa-map-marker"></i> <strong>Direccion:</strong> Av. San Martin 273, Ica</li>
                <li><i class="fa fa-phone"></i> <strong>Telefono:</strong> (056) 237-712</li>
                <li><i class="fa fa-envelope"></i> <strong>Correo:</strong> <a href="informes@casaplaya.com.pe"> informes@systematic.edu.pe</a></li>
              </ul>

              <hr>

            	<h4 class="heading-primary">Horario de <strong>Atención<strong></h4>
              <ul class="list list-icons list-dark mt-xlg">
                <li><i class="fa fa-clock-o"></i> Lunes - Viernes 9am a 9pm</li>
                <li><i class="fa fa-clock-o"></i> Sabado - 9am a 9pm</li>
                <li><i class="fa fa-clock-o"></i> Domingo - 9am a 6pm</li>
              </ul> -
            </div>
          </div>
        </div>
      </div>
      @include('layouts.partials.footer')
    </div>
    @include('layouts.partials.vendor')

  </body>
  <script type="text/javascript">
  $(function(){
   $('[data-toggle="tooltip"]').tooltip();
  });
  </script>
      <script src="http://maps.google.com/maps/api/js?key=AIzaSyBRLI9drNI6Ssvq7ES_Erewm09y0hWxNyE"></script>
      <script>
        var mapMarkers = [{
          address: "Av. San Martin 273, Ica",
          html: "<p>Systematic</p><strong>San Martin</strong><br>Nª 273",
          icon: {
            image: "img/pin.png",
            iconsize: [26, 46],
            iconanchor: [12, 46]
          },
          popup: true
        }];

        // Map Initial Location
        var initLatitude = -14.065606;
        var initLongitude = -75.730176;
        // Map Extended Settings-14.065606,
        var mapSettings = {
          controls: {
            draggable: (($.browser.mobile) ? false : true),
            panControl: true,
            zoomControl: true,
            mapTypeControl: true,
            scaleControl: true,
            streetViewControl: true,
            overviewMapControl: true
          },
          scrollwheel: false,
          markers: mapMarkers,
          latitude: initLatitude,
          longitude: initLongitude,
          zoom: 16
        };
        var map = $("#googlemaps").gMap(mapSettings);
        // Map Center At
        var mapCenterAt = function(options, e) {
          e.preventDefault();
          $("#googlemaps").gMap("centerAt", options);
        }

      </script>
</html>
