<?php
use App\Middleware\AuthenticationMiddleware;
use Psr\Container\ContainerInterface;

$app->add(new AuthenticationMiddleware($container));

$app->get('/', 'App\Controllers\IndexController:index');
$app->get('/signup', 'App\Controllers\LoginController:getSignup')->setName('auth.signup');
$app->get('/signin', 'App\Controllers\LoginController:getSignin')->setName('auth.signin');
$app->post('/signin', 'App\Controllers\LoginController:postSignin')->setName('auth.signin');
$app->get('/signout', 'App\Controllers\LoginController:signout')->setName('auth.signout');