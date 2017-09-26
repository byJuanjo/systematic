<?php
Route::get('/', 'HomeController@index');
//Route::get('login', 'HomeController@login');
//Route::auth();

Route::get('auth/register','Auth\AuthController@getRegister');
Route::post('auth/register','Auth\AuthController@postRegister');
Route::get('/auth/confirm/{email}/{confirm_token}','Auth\AuthController@confirmRegister');
Route::get('/auth/login','Auth\AuthController@getLogin');
Route::post('/auth/login','Auth\AuthController@postLogin');
Route::get('/auth/logout','Auth\AuthController@getLogout');


Route::resource('perfil','PerfilController');
Route::post('/guardarDataUser','PerfilController@guardarDataUser');
Route::get('/descAdmin','PerfilController@descAdmin');
Route::get('/formViewAdd','PerfilController@formViewAdd');
Route::get('/listPermisos/{id}','PerfilController@listPermisos');
Route::post('permiso.conceder','PerfilController@conceder');
Route::get('formViewEdit/{id}','PerfilController@formViewEdit');
Route::post('activarUser','PerfilController@activarUser');

Route::get('/excel','HomeController@excel');
//RUTAS DE PAGINA WEB
//FUNCIONES PARA NOSOTROS
Route::get('/nosotros','HomeController@nosotros');
Route::get('/contacto','HomeController@contacto');
Route::get('/banner','HomeController@banner');
Route::post('/suscribirse','HomeController@suscribirse');
Route::post('/pagination_suscritos','HomeController@pagination_suscritos');
Route::get('/exportarSuscritos','HomeController@exportarSuscritos');
Route::get('/suscripcionContent/{id}','HomeController@suscripcionContent');
Route::post('/updateSuscripcion','HomeController@updateSuscripcion');
Route::post('/updateTelemarketing','HomeController@updateTelemarketing');

//RUTAS PARA LAS VENTAS
Route::get('/ventas','VentasController@index');
Route::get('/ventas.buscarUsuario/{dni}','VentasController@buscarUsuario');
Route::post('/ventas.actualizarUser','VentasController@actualizarUser');
Route::post('/ventas.validarEmail','VentasController@validarEmail');
Route::post('/ventas.validarNewEmail','VentasController@validarNewEmail');
Route::post('/ventas.crearUser','VentasController@crearUser');
Route::get('/ventas.buscarHorario/{curso_id}','VentasController@buscarHorario');
Route::get('/ventas.buscarModulos/{curso_id}','VentasController@buscarModulos');
Route::get('/ventas.buscarOfertas/{curso_id}','VentasController@buscarOfertas');
Route::get('/ventas.traeOferta/{oferta_id}','VentasController@traeOferta');
Route::get('/ventas.traePrecioModulo/{modulos_id}','VentasController@traePrecioModulo');
Route::post('/ventas.crearVenta','VentasController@crearVenta');
Route::post('/pagination_miHistorial','VentasController@pagination_miHistorial');
Route::get('/ventas.miHistorial','VentasController@miHistorial');
Route::get('/ventas.buscarHistoryVenta/{venta_id}','VentasController@buscarHistoryVenta');
Route::get('/ventas.realizarPago/{venta_historial_id}','VentasController@realizarPago');
Route::get('/ventas.asignarHorario/{venta_id}','VentasController@asignarHorario');
Route::post('/ventas.colocarHorario','VentasController@colocarHorario');
Route::post('/ventas.pagarSaldo','VentasController@pagarSaldo');

Route::post('/actualizarBanner','HomeController@actualizarBanner');
Route::post('/subirImgNos','NosotrosController@subirImgNos');
Route::get('/llamarImgNos','NosotrosController@llamarImgNos');
Route::get('/quitarImagenNos/{id}','NosotrosController@quitarImagenNos');
Route::GET('/nosSeccion1','NosotrosController@nosSeccion1');
Route::GET('/nosSeccion2','NosotrosController@nosSeccion2');
Route::GET('/nosSeccion3','NosotrosController@nosSeccion3');
Route::POSt('/actualizarNos','NosotrosController@actualizarNos');

Route::resource('/infraestructura','InfraestructuraController');
Route::get('infraestructura.descripcion','InfraestructuraController@descripcion');
Route::post('/subirImgInf','InfraestructuraController@subirImgInf');
Route::post('infraestructura.quitarImagen','InfraestructuraController@quitarImagen');
Route::post('infraestructura.eliminar','InfraestructuraController@eliminar');

Route::resource('/elearning','ElearningController');
Route::get('elearning.descripcion','ElearningController@descripcion');
Route::post('elearning.eliminar','ElearningController@eliminar');
Route::post('elearning.update','ElearningController@update1');

Route::resource('/certiport','CertiportController');
Route::get('certiport.descripcion','CertiportController@descripcion');
Route::post('certiport.eliminar','CertiportController@eliminar');
Route::post('certiport.update','CertiportController@update1');

Route::resource('/valores','ValoresController');
Route::get('valores.descripcion','ValoresController@descripcion');
Route::post('valores.eliminar','ValoresController@eliminar');
Route::post('valores.update','ValoresController@update1');

//RUTAS PARA LA CREACION DE CURSOS
Route::get('newCurso','CursosController@newCurso');
Route::get('/curso.edit/{id}','CursosController@edit');


Route::post('/crearCurso','CursosController@crearCurso');
Route::get('/promociones','CursosController@promociones');
Route::post('/editCampoCurso','CursosController@editCampoCurso');
Route::resource('cursos','CursosController');
//RUTAS DE CURSOS PARA SUBIR IMAGENES
Route::get('/cursos.modalImagenes/{id}','CursosController@modalImagenes');
Route::post('/subirImagenCurso','CursosController@subirImagenCurso');
Route::get('/cursos.quitarImagenes/{imagen_id}/{curso_id}','CursosController@quitarImagenes');
//RUTAS DE CURSOS PARA CREAR MODULOS
Route::get('/cursos.modalModulo/{id}','CursosController@modalModulo');
Route::post('/crearModulo','CursosController@crearModulo');
Route::get('/cursos.modalCurso/{id}','CursosController@modalCurso');
Route::post('/crearModuloCaracteristica','CursosController@crearModuloCaracteristica');
Route::get('/cursos.listCaracteristicas/{id}','CursosController@listCaracteristicas');
Route::get('/cursos.quitarCaracteristicas/{caracteristica_id}','CursosController@quitarCaracteristicas');
Route::get('/cursos.editModulo/{id}','CursosController@editModulo');
Route::post('/editarCaracteristicaModulo','CursosController@editarCaracteristicaModulo');
Route::post('/updateModulo','CursosController@updateModulo');
Route::get('/modulo/{id}','CursosController@modulo');
Route::post('/enviarComentario','CursosController@enviarComentario');
Route::get('/listComentarios/{curso_id}','CursosController@listComentarios');
Route::post('/responderComentario','CursosController@reponderComentarios');
Route::get('/listPorResponder','CursosController@listPorResponder');
Route::get('/eliminarConsulta/{comentario_id}','CursosController@eliminarConsulta');
//SUBIR SILABOS
Route::get('/cursos.modalSilabo/{id}','CursosController@modalSilabo');
Route::post('/subirSilaboCurso','CursosController@subirSilaboCurso');

//RUTAS PARA MODULO DE HORARIOS
Route::resource('/horarios','HorariosController');
Route::get('/horarios.buscarModulo/{curso_id}','HorariosController@buscarModulo');
Route::post('/horarios.addHorario','HorariosController@addHorario');
Route::get('/horarios.showHor/{id}','HorariosController@showHor');
Route::get('/horarios.DupHor/{id}','HorariosController@DupHor');
Route::get('/horarios.datos','HorariosController@datos');
Route::get('/horarios.agregar','HorariosController@agregar');
Route::post('/horarios.editHorario','HorariosController@editHorario');
Route::get('/horarios.vacantes/{laboratorio_id}','HorariosController@vacantes');

//RUTAS PARA OFERTAS
Route::get('/cursos.ofertas/{curso_id}','CursosController@ofertaForm');
Route::post('/cursos.guardarOferta','CursosController@guardarOferta');
Route::get('/cursos.ofertasEdit/{curso_id}','CursosController@ofertasEdit');
Route::get('/cursos.editOfertas/{ofertas_id}','CursosController@editOfertas');
Route::get('/ofertas/{ofertas_id}','CursosController@ofertas');
Route::post('/cursos.updateOferta','CursosController@updateOferta');
Route::post('/cursos.eliminarOferta','CursosController@eliminarOferta');
//rutas de laboratorio
Route::get('/horarios.dataLab','HorariosController@datalab');
Route::post('/horarios.addLaboratorio','HorariosController@addLaboratorio');
Route::get('/horarios.showLab/{id}','HorariosController@showLab');
Route::post('/horarios.editLaboratorio','HorariosController@editLaboratorio');
//rutas de docentes
Route::get('/horarios.dataDoc','HorariosController@dataDoc');
Route::post('/horarios.addDocente','HorariosController@addDocente');
Route::get('/horarios.showDoc/{id}','HorariosController@showDoc');
Route::post('/horarios.editDocente','HorariosController@editDocente');
