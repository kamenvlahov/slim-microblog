<?php
use App\Middleware\AuthenticationMiddleware;
use Psr\Container\ContainerInterface;



$app->group('', function(){
    $this->get('/signout', 'App\Controllers\LoginController:signout')
    ->setName('auth.signout');
    
    $this->post('/article/add', 'App\Controllers\ArticlesController:postArticle')
    ->setName('articles.add');

    $this->get('/article/add', 'App\Controllers\ArticlesController:addArticle')
    ->setName('articles.add');

    $this->get('/article/update/{id}', 'App\Controllers\ArticlesController:updateArticle')
    ->setName('articles.update');

    $this->put('/article/update', 'App\Controllers\ArticlesController:putUpdateArticle')
    ->setName('articles.update');

    $this->post('/article/add/image/{id}', 'App\Controllers\ImageController:addImage')
    ->setName('image.add');

    $this->delete('/article/add', 'App\Controllers\ImageController:deleteImage')
    ->setName('image.delete');

})->add(new AuthenticationMiddleware($container));

$app->get('/', 'App\Controllers\IndexController:index')
->setName('home');

$app->get('/article/{id}', 'App\Controllers\ArticlesController:getArticle')
->setName('articles.show');

$app->get('/articles', 'App\Controllers\ArticlesController:index')
->setName('articles');

$app->get('/signup', 'App\Controllers\LoginController:getSignup')
->setName('auth.signup');

$app->post('/signup', 'App\Controllers\LoginController:postSignup')
->setName('auth.signup');

$app->get('/signin', 'App\Controllers\LoginController:getSignin')
->setName('auth.signin');

$app->post('/signin', 'App\Controllers\LoginController:postSignin')
->setName('auth.signin');

