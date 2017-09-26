
<!DOCTYPE html>
<html>
	<head>
		@include('layouts.partials.scripts')
	</head>
	<body>
		<div class="body">
      <section class="page-header">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <ul class="breadcrumb">
                <li><a href="/">Regresar</a></li>
              </ul>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <h1>Inicia / Registrate</h1>
            </div>
          </div>
        </div>
      </section>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="featured-boxes">
              <div class="row">
                <div class="col-sm-4">
                  <div class="featured-box featured-box-primary align-left mt-xlg">
                    <div class="box-content">
                      <h4 class="heading-primary text-uppercase mb-md">Ya soy usuario</h4>
											<div class="text-info">
												@if(Session::has('message1'))
													<h4>{{Session::get('message1')}}</h4>
												@endif
											</div>
                      <form action="{{ url('/auth/login') }}" id="frmSignIn" method="post">
												{{ csrf_field() }}
                        <div class="row">
                          <div class="form-group">
                            <div class="col-md-12">
															<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
	                              <label>Correo</label>
	                              <input  id="email" type="email" name="email" value="{{ old('email') }}" class="form-control input-lg">
																@if ($errors->has('email'))
																		<span class="help-block">
																				<strong>{{ $errors->first('email') }}</strong>
																		</span>
																@endif
															</div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group">
                            <div class="col-md-12">
															<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
	                              <label>Contraseña</label>
	                              <input type="password" id="password" value="" name="password" class="form-control input-lg">
																@if ($errors->has('password'))
																	<span class="help-block">
																		<strong>{{ $errors->first('password') }}</strong>
																	</span>
																@endif
															</div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <span class="remember-box checkbox">
                              <label for="rememberme">
                                <input type="checkbox" id="rememberme" name="rememberme">Recuerdame
                              </label>
                            </span>
                          </div>
                          <div class="col-md-6">
														<button type="submit" class="btn btn-primary">
																<i class="fa fa-sign-out" aria-hidden="true"></i> Ingresar
														</button>
                          </div>
													<a class="pull-right" href="{{ url('/password/reset') }}">(¿Olvidaste la contraseña?)</a>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <div class="col-sm-8">
                  <div class="featured-box featured-box-primary align-left mt-xlg">
                    <div class="box-content">
                      <h4 class="heading-primary text-uppercase mb-md">Registra nuevo Usuario</h4>
											<div class="text-info">
												@if(Session::has('message'))
													<h4>{{Session::get('message')}}</h4>
												@endif
											</div>
											<form class="form-horizontal" role="form" method="POST" action="{{ url('auth/register') }}">
	                        {{ csrf_field() }}
													<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
	                            <label for="email" class="col-md-4 control-label">Tipo</label>
	                            <div class="col-md-6">
																<select class="form-control" name="tipo" id="tipo">
																	<option value="2">Usuario Normal</option>
																	<option value="3">Usuario Corporativo (Solo si eres empresa)</option>
																</select>
	                                @if ($errors->has('tipo'))
	                                    <span class="help-block">
	                                        <strong>{{ $errors->first('tipo') }}</strong>
	                                    </span>
	                                @endif
	                            </div>
	                        </div>
	                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
	                            <label for="email" class="col-md-4 control-label">Correo</label>
	                            <div class="col-md-6">
	                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">
	                                @if ($errors->has('email'))
	                                    <span class="help-block">
	                                        <strong>{{ $errors->first('email') }}</strong>
	                                    </span>
	                                @endif
	                            </div>
	                        </div>
	                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
	                            <label for="password" class="col-md-4 control-label">Contraseña</label>

	                            <div class="col-md-6">
	                                <input id="password" type="password" class="form-control" name="password">
	                                @if ($errors->has('password'))
	                                    <span class="help-block">
	                                        <strong>{{ $errors->first('password') }}</strong>
	                                    </span>
	                                @endif
	                            </div>
	                        </div>
	                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
	                            <label for="password-confirm" class="col-md-4 control-label">Confirma tu contraseña</label>
	                            <div class="col-md-6">
	                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
	                                @if ($errors->has('password_confirmation'))
	                                    <span class="help-block">
	                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
	                                    </span>
	                                @endif
	                            </div>
	                        </div>
	                        <div class="form-group">
	                            <div class="col-md-6 col-md-offset-4">
	                                <button type="submit" class="btn btn-primary">
	                                    <i class="fa fa-user-plus" aria-hidden="true"></i> Registrate
	                                </button>
	                            </div>
	                        </div>
	                    </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
			@include('layouts.partials.footer')
		</div>
		@include('layouts.partials.vendor')
	</body>
</html>
