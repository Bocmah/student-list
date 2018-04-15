<?php

$router->defineGet("", "HomeController@index");
$router->defineGet("register", "RegisterController@index");
$router->defineGet("profile", "ProfileController@index");
$router->defineGet("profile/edit", "ProfileController@showEdit");
$router->definePost("register", "RegisterController@store");
$router->definePost("profile/edit", "ProfileController@store");
