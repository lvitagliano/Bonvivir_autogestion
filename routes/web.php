<?php


Route::get('/composetalentoseleccionado/{id}', 'unComposeController@composetalentoselec')->name('composetalentoseleccionado');
Route::get('/ver-casting-completo/{id}','aceptController@castingcompleto')->name('castingcompleto');
Route::get('/ver-casting-enviado/{id}','aceptController@castingenviado')->name('castingenviado');

Route::get('/casting-confirmar/{id}', 'aceptController@aceptar')->name('aceptar');
Route::get('/casting-rechazar/{id}', 'aceptController@rechazar')->name('rechazar');
Route::get('/acept-cast/{id}', 'aceptController@index')->name('acept-cast');
Route::get('/ver-casting/{uid}', 'aceptController@vercasting')->name('ver-casting');
Route::get('/lista-videos', 'VideosController@listavideos')->name('listavideos');
Route::get('/baja-videos', 'VideosController@bajavideos')->name('bajavideos');
Route::get('/favoritear/{id}','CheckController@favoritear')->name('favoritear');

Auth::routes();

Route::group(['middleware' => ['auth','verificartalento','verificaradmin']], function() {

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/bienvenida', 'HomeController@bienvenida')->name('bienvenida');
Route::get('/mis-talentos', 'MisTalentosController@index')->name('mistalentos');
Route::get('/buscar', 'BuscarController@index')->name('buscar');
Route::any('/mis-proyectos', 'MisProyectosController@index')->name('misproyectos');
Route::any('/buscar-proyectos', 'MisProyectosController@buscarProyectos')->name('buscarproyectos');
Route::get('/unproyecto/{id}','unProyectoController@unproyecto')->name('unproyecto');

//Autenticacion con Redes Sociales
Route::get('auth/{provider}', 'Auth\SocialAuthController@redirectToProvider')->name('social.auth');
Route::get('auth/{provider}/callback', 'Auth\SocialAuthController@handleProviderCallback');

Route::get('auth/linkedin', 'Auth\AuthController@redirectToLinkedin');
Route::get('auth/linkedin/callback', 'Auth\AuthController@handleLinkedinCallback');

Route::post('/buscar-talentos', 'BuscarController@buscarTalentos')->name('buscartalentos');
Route::get('/buscar-talentos', 'BuscarController@buscarTalentos')->name('buscartalentos');
Route::get('/talentos-inicial', 'BuscarController@talentosInicial')->name('talentosinicial');
Route::get('/home-talentos-inicial', 'HomeController@homeTalentosInicial')->name('hometalentosinicial');

Route::post('/guardar-sobre-mi', 'HomeController@guardarSobremi')->name('guardarsobremi');
Route::post('/guardar-descripcion', 'HomeController@guardarDescripcion')->name('guardardescripcion');
Route::post('/guardar-representante', 'HomeController@guardarRepresentante')->name('guardarrepresentante');
Route::post('/subir-foto-perfil', 'HomeController@subirFotoPerfil')->name('subirfotoperfil');
Route::post('/elegir-talento', 'BuscarController@elegirTalento')->name('elegirtalento');
Route::post('/guardar-empresa', 'HomeController@guardarEmpresa')->name('guardarempresa');

Route::post('/agregar-talento-gusto/{id}', 'BuscarController@agregarTalentoGusto')->name('agregartalentogusto');
Route::post('/listar-talento-gusto/{id}', 'BuscarController@listarTalentoPorProyecto')->name('listarTalentoPorProyecto');
Route::post('/eliminar-talento-gusto/{id}', 'BuscarController@eliminarTalentoGusto')->name('eliminartalentogusto');
Route::get('/talentos-gusto', 'BuscarController@listarTalentoGusto')->name('listarTalentoGusto');

Route::get('/talentos-seleccionado/{id}', 'unProyectoController@listarTalentoSeleccionado')->name('listarTalentoSeleccionado');
Route::get('/talentos-seleccionadoAceptado/{id}', 'unProyectoController@listarTalentoSeleccionadoAceptado')->name('listarTalentoSeleccionadoAceptado');
Route::get('/talentos-seleccionadoRechazado/{id}', 'unProyectoController@listarTalentoSeleccionadoRechazado')->name('listarTalentoSeleccionadoRechazado');


Route::get('/proyectos-lista', 'MisProyectosController@listarMisProyectos')->name('listarMisProyectos');
Route::post('/agregar-proyecto', 'MisProyectosController@agregarProyecto')->name('agregarproyecto');
Route::post('/eliminar-proyecto/{id}', 'MisProyectosController@eliminarproyecto')->name('eliminarproyecto');

Route::post('/enviar-notificacion/{id}', 'MisProyectosController@enviarNotificacion')->name('enviarnotificacion');
Route::get('/notificar/{id}', 'MisProyectosController@Notificar')->name('notificar');

Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);


Route::post('/ver-talentos-proyecto', 'MisProyectosController@vertalentosproyectos')->name('vertalentosproyectos');
Route::post('/elegir-pagos', 'unProyectoController@elegirpagos')->name('elegirpagos');

Route::get('/pagar', 'PagarController@index')->name('pagar');

Route::post('/generarpdf/{id}','unProyectoController@generatepdf')->name('generatepdf');
Route::get('/seleccionar/{id}','unProyectoController@seleccionar')->name('seleccionar');


Route::get('/perfiltalentoseleccionado/{id}', 'unProyectoController@perfiltalentoselec')->name('perfiltalentoseleccionado');


Route::get('/notificar/{id}', 'MisProyectosController@Notificar')->name('notificar');

Route::get('/elegir-rol', 'HomeController@elegirrol')->name('elegirrol');

Route::get('/eliminar-talento-proyecto/{id}/{ids}', 'unProyectoController@eliminartalentoproyecto')->name('eliminartalentoproyecto');

Route::post('/enviar-proyecto-mail/{castid}', 'MisProyectosController@enviarpormail')->name('enviarpormail');
Route::post('/enviar-proyecto-msj/{castid}', 'MisProyectosController@enviarpormsj')->name('enviarpormsj');

Route::post('/finalizar-seleccion/{castid}', 'unProyectoController@finalizarseleccion')->name('finalizarseleccion');

// ----------------------- Comienzan las rutas de vue -------------------------------------------//

Route::get('/planes/{name?}', 'planesController@planes')->name('planes');
Route::resource('/planConfigurableIndustria', 'planes\planController')->middleware('auth');
Route::resource('/pagosPlanes', 'planes\pagosController')->middleware('auth');
Route::resource('/listarPagosPlanes', 'planes\pagosActivosController')->middleware('auth');
Route::get('/pagos/{id}', 'planesController@pagos')->name('pagos');
Route::post('/guardarPago', 'planesController@guardarPago')->name('guardarPago');

Route::get('/descargar-fotos/{id}', 'MisProyectosController@descargarFotos')->name('descargarFotos');

Route::get('/cancelar-codigo/{id}', 'MisProyectosController@cancelarcodigo')->name('cancelarcodigo');
Route::post('/aceptar-codigo/{id}', 'MisProyectosController@aceptarcodigo')->name('aceptarcodigo');

Route::get('/compras/{name?}', 'planesController@compras')->name('compras');

Route::get('/poseePago', 'MisProyectosController@poseePago')->name('poseePago');

Route::get('/busqueda-ia', 'BusquedaIAController@busquedaia')->name('busquedaia');
Route::post('/enviar-foto', 'BusquedaIAController@enviarFoto')->name('enviarFoto');


Route::get('/obtener-chat/{id}/{casting}', 'unProyectoController@obtenerchat')->name('obtenerchat');
Route::post('/enviar-mensaje-chat/{id}', 'unProyectoController@enviarmensajechat')->name('enviarmensajechat');

Route::post('/enviar-chat-video/{id}', 'unProyectoController@enviarchatvideo')->name('enviarchatvideo');


Route::get('/subir-videos', 'VideosController@index')->name('subirvideos');
Route::post('/subir-videos-upload', 'VideosController@subirvideosupdaload')->name('subirvideosupdaload');


Route::get('/editar-proyecto/{id}', 'MisProyectosController@editarproyecto')->name('editarproyecto');
Route::post('/editar-proyecto-guardado/{id}', 'MisProyectosController@editarproyectoform')->name('editarproyectoform');
Route::get('/mostrar-video/{id}', 'unProyectoController@mostrarvideo')->name('mostrarvideo');

});


//////CAMBIO DE LENGUAJE
Route::get('lang/{lang}', function($lang) {
  \Session::put('lang', $lang);
  return \Redirect::back();
})->middleware('web')->name('change_lang');

