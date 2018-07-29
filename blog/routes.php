<?php
$route->get('/', 'HomeController@home');
$route->get('/usuarios', 'HomeController@usuarios');

$route->post('/usuarios', 'HomeController@store');