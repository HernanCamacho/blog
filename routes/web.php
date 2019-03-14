<?php

Route::get('/', ['as' => 'home', 'uses' => 'PagesController@home']);

Route::get('saludos/{nombre?}', ['as' => 'saludos', 'uses' => 'PagesController@saludos'])->where('nombre', "[A-Za-z]+");

Route::resource('mensajes', 'MessagesController');
Route::resource('usuarios', 'UsersController');

Route::get('login', 'Auth\LoginController@showLoginForm');
Route::post('login', ['as'=> 'login', 'uses' => 'Auth\LoginController@login']);
Route::get('logout', 'Auth\LoginController@logout');

// test
// App\User::create([
//     'name'=>'moderador',
//     'email'=>'moderador@hernan.com',
//     'password'=>bcrypt('hernan'),
// ]);
