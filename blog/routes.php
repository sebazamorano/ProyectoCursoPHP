<?php
$route->get('/', 'HomeController@home');
$route->get('/usuarios', 'HomeController@usuarios');
$route->get('/usuarios/{id}', 'HomeController@view');

$route->post('/usuarios', 'HomeController@store');