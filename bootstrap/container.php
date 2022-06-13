<?php

use App\Repository\ArticleRepository;
use App\Repository\ArticleRepositoryInterface;
use App\Repository\ImageRepository;
use App\Repository\ImageRepositoryInterface;
use App\Repository\UserRepository;
use App\Repository\UserRepositoryInterface;

$container = $app->getContainer();

/* 
    container twig view
*/
$container['view'] = function ($container) {
    $view = new \Slim\Views\Twig(__DIR__ . '/../templates', [
        'cache' => false,
        'debug' => true
    ]);
    $basePath = rtrim(str_ireplace('index.php', '', $container['request']->getUri()->getBasePath()), '/');
    $view->addExtension(new Slim\Views\TwigExtension($container['router'], $basePath));
    $view->getEnvironment()->addGlobal('flash', $container->flash);
    $view->getEnvironment()->addGlobal('auth', $container->authentication->getLogedUser());
    return $view;
};

/* 
    container for Database Eloquent
*/
$capsule = new \Illuminate\Database\Capsule\Manager;
$capsule->addConnection($container['settings']['db']);
$capsule->setAsGlobal();
$capsule->bootEloquent();
$container['db'] = function ($container) use ($capsule) {
    return $capsule;
};

/* 
    Validation container
*/

$container['validator'] = function ($container) {
    return new App\Validation\Validator();
};
/* 
    Authentication container
*/
$container['authentication'] = function ($container) 
{
    return new \App\Services\AuthenticationService();
};
/* 
    FileUpload container
*/
$container['fileupload'] = function ($container) 
{
    return new \App\Services\FileUploadService();
};
$container['upload_directory'] =$directory = __DIR__ . "\..\uploads";
/* 
    Flash container
*/
$container['flash'] = function () {
    return new \Slim\Flash\Messages();
};



/* 
    Repository containers
*/
$container[ArticleRepositoryInterface::class] = function ($container)
{
    return new ArticleRepository($container);
};
$container[ImageRepositoryInterface::class] = function ($container)
{
    return new ImageRepository($container);
};
$container[UserRepositoryInterface::class] = function ($container)
{
    return new UserRepository($container);
};