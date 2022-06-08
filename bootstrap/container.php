<?php

$container = $app->getContainer();

/* 
    container twig view
*/
$container['view'] = function ($container) {
    $view = new \Slim\Views\Twig(__DIR__ . '/../templates', [
        'cache' => false
    ]);
    $basePath = rtrim(str_ireplace('index.php', '', $container['request']->getUri()->getBasePath()), '/');
    $view->addExtension(new Slim\Views\TwigExtension($container['router'], $basePath));
    $view->getEnvironment()->addGlobal('flash', $container->flash);
    $view->getEnvironment()->addGlobal('test', 'Test');
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
    Flash container
*/
$container['authentication'] = function ($container) {
    return new \App\Services\AuthenticationService();
};
/* 
    Flash container
*/
$container['flash'] = function () {
    return new \Slim\Flash\Messages();
};
