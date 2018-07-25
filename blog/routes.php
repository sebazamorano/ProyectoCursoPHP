<?php
$route->get('/hola', 'HomeController@hola');
$route->get('/chao', 'HomeController@chao');
$route->get('/saludo', 'HomeController@saludo');
$route->post('/nuevo-usuario', 'UserController@store');