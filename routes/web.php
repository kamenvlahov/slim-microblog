<?php
use App\Middleware\AuthenticationMiddleware;
use Psr\Container\ContainerInterface;



$app->group('', function(){
    $this->get('/signout', 'App\Controllers\LoginController:signout')->setName('auth.signout');
})->add(new AuthenticationMiddleware($container));

$app->get('/', 'App\Controllers\IndexController:index')->setName('home');
$app->get('/articles', 'App\Controllers\ArticlesController:index')->setName('articles');
$app->get('/signup', 'App\Controllers\LoginController:getSignup')->setName('auth.signup');
$app->get('/signin', 'App\Controllers\LoginController:getSignin')->setName('auth.signin');
$app->post('/signin', 'App\Controllers\LoginController:postSignin')->setName('auth.signin');
