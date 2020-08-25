<?php


/*****************ADMIN ROUTES*******************
 *@shady --Topicos  
 */

 /* Admin part routing */
Route::get('/', 'LoginController@login');
Route::get('/login', 'LoginController@login');
Route::post('/authenticate', 'LoginController@authenticate');
Route::get('/logout', 'LoginController@logout');
// Password Reset Routes...

Route::get('password/resets/{token?}', 'LoginController@showResetForm');
Route::post('password/resets/{token?}', 'LoginController@setPassword');
Route::post('password/email', 'LoginController@sendResetLinkEmail');
Route::get('password/reset', 'LoginController@reset');

Route::Group(['prefix' => 'admin'], function () { 

	Route::get('/', 'AdminDashboardController@index');

	Route::get('usuarios','UsuariosController@index');
	Route::post('usuarios/post','UsuariosController@load');
	Route::post('usuarios/save','UsuariosController@store');
	Route::post('usuarios/update','UsuariosController@store');
	Route::post('usuarios/{id}','UsuariosController@edit');
	Route::post('usuarios/destroy/{id}','UsuariosController@destroy');


	Route::get('perfil','PerfilController@index');
	Route::post('perfil/post','PerfilController@load');
	Route::post('perfil/save','PerfilController@store');
	Route::post('perfil/update','PerfilController@store');
	Route::post('perfil/{id}','PerfilController@edit');
	Route::post('perfil/destroy/{id}','PerfilController@destroy');


	
	Route::get('topicos','TopicosController@index');
	Route::post('topicos/post','TopicosController@load');
	Route::post('topicos/save','TopicosController@store');
	Route::post('topicos/update','TopicosController@store');
	Route::post('topicos/{id}','TopicosController@edit');
	Route::post('topicos/destroy/{id}','TopicosController@destroy');


	Route::get('subscritores','SubscritorController@index');
	Route::post('subscritores/post','SubscritorController@load');
	Route::post('subscritores/save','SubscritorController@store');
	Route::post('subscritores/update','SubscritorController@store');
	Route::post('subscritores/{id}','SubscritorController@edit');
	Route::post('subscritores/destroy/{id}','SubscritorController@destroy');

	
	
	Route::get('perguntas/lista/{id?}','PerguntasController@index');
	Route::get('perguntas/create','PerguntasController@create');
	Route::post('perguntas/post','PerguntasController@load');
	Route::post('perguntas/save','PerguntasController@store');
	Route::post('perguntas/update','PerguntasController@store');
	Route::post('perguntas/{id}','PerguntasController@edit');
	Route::post('perguntas/destroy/{id}','PerguntasController@destroy');

	Route::get('dashboard','AdminDashboardController@index');

	

	Route::get('subscricoes','SubscricoesController@index');
	Route::get('subscricoes/{id}/show','SubscricoesController@show');
	Route::post('subscricoes/post','SubscricoesController@load');
	Route::post('subscricoes/save','SubscricoesController@store');
	Route::post('subscricoes/update','SubscricoesController@store');
	Route::post('subscricoes/{id}','SubscricoesController@edit');
	Route::post('subscricoes/destroy/{id}','SubscricoesController@destroy');
	Route::get('simulador','SimuladorController@index');
	
});
