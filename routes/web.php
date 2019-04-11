<?php


Route::get('/entrar', function () {
    return view('entrar');
});


Auth::routes();

//guest ->si no esta conectado , auth ->si esta conectado
//--------------------------------------------------------------------------------------------------
Route::group(['middleware'=>'auth'],function(){
 
	Route::get('/miperfil', 'perfilController@index');
    Route::resource('/producto','productoController');
    Route::resource('/producto/eliminar','productoController@destroy');
});



Route::get('/', 'indexController@index'); //esta el index y el entrar
Route::get('/reservar', 'reservarController@index'); //esta el index y el entrar

Route::get('/public',function(){
	 $productos= App\Question::all();
	 return $productos;
});

//ruta de google +
Route::group(['prefix' => 'auth'], function () {
    Route::get('/{provider}', 'Auth\LoginController@redirectToProvider');
    Route::get('/{provider}/callback', 'Auth\LoginController@handleProviderCallback');
});