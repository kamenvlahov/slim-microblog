<?php

namespace App\Middleware;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class AuthenticationMiddleware extends Middleware
{

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, callable $next)
    {
        $check = $this->container->authentication->checkForLogin();
        $response = $next($request, $response);
        return $response;
    }
}
