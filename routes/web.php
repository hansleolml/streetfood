<?php


Route::get('/entrar', 'indexController@index');

Auth::routes();


//guest ->si no esta conectado , auth ->si esta conectado
//--------------------------------------------------------------------------------------------------
Route::group(['middleware'=>'auth'],function(){
 
	Route::get('/miperfil', 'perfilController@index');
	Route::get('/misreservas', 'reservaController@index');
	Route::get('/reserva/review/{id}', 'reservaController@review');
    Route::resource('/producto','productoController');
    Route::resource('/reserva','reservaController');
    Route::resource('/categoria','categoriaController');
    Route::resource('/miperfil','perfilController');
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