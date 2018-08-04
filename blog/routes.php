<?php
$route->get('/', 'HomeController@home');

$route->get('/usuarios', 'UsuarioController@usuarios');

$route->get('/crearUsuario', 'UsuarioController@create');
$route->post('/usuarios', 'UsuarioController@store');

$route->get('/actualizarUsuario', 'UsuarioController@formActualizar');
$route->post('/update', 'UsuarioController@update');

$route->post('/eliminarUsuario', 'UsuarioController@eliminar');
