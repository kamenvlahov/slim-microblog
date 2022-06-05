<?php

namespace App\Controllers;

use App\Controllers\Controller;
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

class IndexController extends Controller
{
    public function index(Request $request, Response $response) 
    {
        return $this->container->view->render($response, 'home.twig');
    }
}
