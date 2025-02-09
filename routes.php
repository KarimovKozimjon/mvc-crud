<?php

require_once 'controllers/HomeController.php';
require_once 'controllers/AuthController.php';
require_once 'controllers/PostController.php';
require_once 'controllers/UserController.php';

$routes = [
    '/' => [
        'controller' => 'HomeController',
        'method' => 'index',
    ],
    '/register' => [
        'controller' => 'AuthController',
        'method' => 'register'
    ],
    '/login' => [
        'controller' => 'AuthController',
        'method' => 'login'
    ],
    '/logout' => [
        'controller' => 'AuthController',
        'method' => 'logout'
    ],
    '/handleRegister' => [
        'controller' => 'AuthController',
        'method' => 'handleRegister'
    ],
    '/handleLogin' => [
        'controller' => 'AuthController',
        'method' => 'handleLogin'
    ],
    '/profile' => [
        'controller' => 'UserController',
        'method' => 'profile'
    ],
    '/profile/edit' => [
        'controller' => 'UserController',
        'method' => 'edit'
    ],
    '/handleEdit' => [
        'controller' => 'UserController',
        'method' => 'handleEdit'
    ],
    '/posts' => [
        'controller' => 'PostController',
        'method' => 'index'
    ],
    '/create' => [
        'controller' => 'PostController',
        'method' => 'cPost'
    ],
    '/store' => [
        'controller' => 'PostController',
        'method' => 'store'
    ],
    '/posts/show' => [
        'controller' => 'PostController',
        'method' => 'show'
    ],
    
    '/posts/delete' => [
        'controller' => 'PostController',
        'method' => 'delete'
    ],
    '/posts/edit' => [
        'controller' => 'PostController',
        'method' => 'locationEdit' 
    ],
    '/posts/update' => [
        'controller' => 'PostController',
        'method' => 'edit_post' 
    ],
    
    
    


];

// Get the incoming url e.g www.example.com/user [/user]
$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH); // /users
$route = $routes[$url];

if ($route) {
    $controller = new $route['controller'](); // new UserController()
    $method = $route['method']; // index
    $controller->$method(); // $controller->index()
} else {
    header("HTTP/1.0 404 Not Found");
    require 'views/utilities/404.php';
}


