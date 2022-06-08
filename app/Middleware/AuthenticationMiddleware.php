<?php

namespace App\Middleware;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class AuthenticationMiddleware extends Middleware
{

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, callable $next)
    {
        $check = $this->container->authentication->checkForLogin();
        if($check){
            return $response->withRedirect($this->container->router->pathFor('auth.signin'));
        }
        $response = $next($request, $response);
        return $response;
    }
}
