<?php


Route::get('/entrar', 'indexController@index');

Auth::routes();


//guest ->si no esta conectado , auth ->si esta conectado
//--------------------------------------------------------------------------------------------------
Route::group(['middleware'=>'auth'],function(){
 
	Route::get('/miperfil', 'perfilController@index');
    Route::get('/pruebareporte', 'reporteController@pruebareporte');
	Route::get('/misreservas', 'reservaController@index');
    Route::get('/misnotificaciones', 'notificacionController@index');
    Route::get('/miscupones', 'cuponController@index');
    Route::get('/misreportes', 'reporteController@index');
    Route::get('/misreportes_cliente', 'reporteController@cliente_index');
    Route::get('/misreportes_chef', 'reporteController@chef_index');
	Route::get('/reserva/review/{id}', 'reservaController@review');
    Route::post('/reporte/reservas', 'reporteController@reporte_reservas');
    Route::post('/reporte/clientes', 'reporteController@reporte_cliente');
    Route::post('/reporte/chef', 'reporteController@reporte_chef');
    Route::resource('/reporte','reporteController');
    Route::resource('/producto','productoController');
    Route::resource('/notificacion','notificacionController');
    Route::resource('/reserva','reservaController');
    Route::resource('/cupon','cuponController');
    Route::resource('/categoria','categoriaController');
    Route::resource('/comentario','comentarioController');
    Route::resource('/miperfil','perfilController');
    Route::resource('/verperfil','comentarioController');
    Route::get('/crearperfil','perfilController@create');
    Route::get('/editar', function () {
	    return view('editar');
	});
});



Route::get('/', 'indexController@index'); //esta el index y el entrar
Route::get('/reservar', 'productoController@index'); //esta el index y el entrar

Route::get('/public',function(){
	 $productos= App\Question::all();
	 return $productos;
});

//ruta de google +
Route::group(['prefix' => 'auth'], function () {
    Route::get('/{provider}', 'Auth\LoginController@redirectToProvider');
    Route::get('/{provider}/callback', 'Auth\LoginController@handleProviderCallback');
});