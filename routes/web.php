<?php

Route::get('/', ['as' => 'home', 'uses' => 'PagesController@home']);

Route::get('saludos/{nombre?}', ['as' => 'saludos', 'uses' => 'PagesController@saludos'])->where('nombre', "[A-Za-z]+");

Route::resource('mensajes', 'MessagesController');
Route::resource('usuarios', 'UsersController');

Route::get('login', 'Auth\LoginController@showLoginForm');
Route::post('login', ['as'=> 'login', 'uses' => 'Auth\LoginController@login']);
Route::get('logout', 'Auth\LoginController@logout');


// Sirve para conectar con angular prrroooo
// Route::get('roles', function(){
//     return \App\Role::all();
// });
Route::get('roles', function(){
    return \App\Role::with('user')->get();
});

// test
// App\User::create([
//     'name'=>'hernan',
//     'email'=>'estudiante@hernan.com',
//     'password'=>bcrypt('hernan')
// ]);
// //
// App\Role::create([
//     'key'=>'estudiante',
//     'name'=>'Estudiante del sitio'
// ]);
