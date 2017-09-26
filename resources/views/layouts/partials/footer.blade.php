<footer id="footer">
  <div class="container">
    <div class="row">
      <div class="footer-ribbon">
        <span>Ver Catalogo</span>
      </div>
      <div class="col-md-4">
        <div class="newsletter">
          <h4>Suscribete</h4>
          <p>Dejanos tu email, para que recibas las mejores promociones y ofertas de nuestros cursos</p>
          <div class="alert alert-success hidden" id="newsletterSuccess">
            <strong>¡Perfecto!</strong> Tu correo fue agregado pronto te enviaremos las mejores promociones y ofertas.
          </div>
          <div class="alert alert-danger hidden" id="newsletterError"></div>
          <form id="contactForm1">
            <div class="input-group">
              <label>Curso de Interes</label>
              <select class="form-control required" id="cursos_id" name="cursos_id">
                <option value="">Elige un curso de Interes</option>
                @foreach($cursos as $curso)
                <option value="{{$curso->id}}">{{$curso->titulo}}</option>
                @endforeach
              </select>
            </div><br>
            <div class="input-group">
              <input type="hidden" id="token" name="_token" readonly="true" value="{{csrf_token()}}">
              <input class="form-control required" placeholder="Email " name="email" id="email" type="text">
              <span class="input-group-btn">
                <p class="btn btn-default" onclick="suscribirse('#contactForm1')">Enviar!</p>
              </span>
            </div>
          </form>
        </div>
      </div>
      <div class="col-md-4">
        <div class="contact-details">
          <h4>Contactanos</h4>
          <ul class="contact">
            <li><p><i class="fa fa-map-marker"></i> <strong>Direccion:</strong> Av. San Martín #273 –  Ica / Perú</p></li>
            <li><p><i class="fa fa-phone"></i> <strong>Telefono:</strong> (056) 237-712</p></li>
            <li><p><i class="fa fa-envelope"></i> <strong>Correo:</strong> <a href="mailto:informes@systematic.edu,pe">informes@systematic.edu,pe</a></p></li>
          </ul>
        </div>
      </div>
      <div class="col-md-4">
        <h4>Siguenos</h4>
        <ul class="social-icons">
          <li class="social-icons-facebook"><a href="https://web.facebook.com/esystematic/?ref=br_rs" target="_blank" title="Facebook"><i class="fa fa-facebook"></i></a></li>
          <li class="social-icons-twitter"><a href="https://twitter.com/Systematic_edu" target="_blank" title="Twitter"><i class="fa fa-twitter"></i></a></li>
          <li class="social-icons-youtube"><a href="https://www.youtube.com/user/systematic273" target="_blank" title="Linkedin"><i class="fa fa-youtube-play"></i></a></li>
        </ul>
      </div>
    </div>
  </div>
  <div class="footer-copyright">
    <div class="container">
      <div class="row">
        <div class="col-md-2">
          <a href="index.html" class="logo">
            <img alt="Porto Website Template" class="img-responsive" src="img/logo-footer.jpg">
          </a>
        </div>
        <div class="col-md-9">
          <p>© Copyright 2017 | Desarrollado por: <a target="_blank" href="http://www.system-cloud.com">System-Cloud</a>.</p>
        </div>
      </div>
    </div>
  </div>
</footer>
