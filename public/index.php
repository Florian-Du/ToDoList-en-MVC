<?php

session_start();

require '../src/config/config.php';
require '../vendor/autoload.php';
require SRC . 'helper.php';

$router = new Todo\Router($_SERVER["REQUEST_URI"]);
$router->get('/', "StagiaireController@index");

//$router->get('/login/', "UserController@showLogin");
//$router->get('/register/', "UserController@showRegister");
//$router->get('/logout/', "UserController@logout");
//$router->post('/login/', "UserController@login");
//$router->post('/register/', "UserController@register");

$router->get('/stagiaire', "StagiaireController@create");
$router->get('/stagiaire/ShowAll', "StagiaireController@ShowAll");
$router->get('/stagiaire/formDelete', "StagiaireController@formDelete");
$router->get('/stagiaire/formStagiaire', "StagiaireController@formStagiaire");

$router->post('/stagiaire/store', "StagiaireController@store");
$router->post('/stagiaire/delete', "StagiaireController@delete");
$router->post('/stagiaire/modification', "StagiaireController@update");

$router->run();
