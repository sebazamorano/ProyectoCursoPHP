<?php
$route->get('/', 'HomeController@home');

$route->get('/usuarios', 'UsuarioController@usuarios', ['before' => 'auth']);

$route->get('/crearUsuario', 'UsuarioController@create');
$route->post('/usuarios', 'UsuarioController@store');

$route->get('/actualizarUsuario/{id}', 'UsuarioController@formActualizar');
$route->post('/update/{id}', 'UsuarioController@update');

$route->post('/eliminarUsuario/{id}', 'UsuarioController@eliminar');

//Ver Form Login
$route->get('/login', 'AuthController@loginForm');
$route->get('/logout', 'AuthController@logout');

//Post Acceso a Login
$route->post('/login', 'AuthController@login');

