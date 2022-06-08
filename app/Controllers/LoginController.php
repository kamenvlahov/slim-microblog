<?php

namespace App\Controllers;

use App\Controllers\Controller;
use Respect\Validation\Validator as v;
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;


class LoginController extends Controller
{
    public function getSignup(Request $request, Response $response)
    {
        return $this->container->view->render($response, 'signup.twig');
    }
    public function postSignup(Request $request, Response $response)
    {
        // if ($request) {
        //     $validation = $this->validator->validate($request, [
        //         'email' => v::noWhitespace()->notEmpty()->email(),
        //         'password' => v::noWhitespace()->notEmpty(),
        //         'repassword' => v::noWhitespace()->notEmpty()
        //     ]);
        // }
        return $this->container->view->render($response, 'signup.twig');
    }

    public function getSignin(Request $request, Response $response)
    {
        return $this->container->view->render($response, 'signin.twig');
    }

    public function postSignin(Request $request, Response $response)
    {
        $validation = $this->validator->validate($request, [
            'email' => v::noWhitespace()->notEmpty()->email(),
            'password' => v::noWhitespace()->notEmpty()
        ]);

        if (count($validation['errors'])) {
            foreach ($validation['errors'] as $error) {
                $this->container->flash->addMessage('error', $error);
            }
            return $response->withRedirect($this->container->router->pathFor('auth.signin'));
        }
        $auth = $this->container->authentication->setLogin(
            $request->getParams()['email'],
            $request->getParams()['password']
        );
        if (!$auth) {
            $this->container->flash->addMessage('error', "Wrong user or password!");
            return $response->withRedirect($this->container->router->pathFor('auth.signin'));
        }
        $this->container->flash->addMessage('info', "You are logged in.");
        return $response->withRedirect($this->container->router->pathFor('home'));

        return $this->container->view->render($response, 'signin.twig');
    }

    public function signout(Request $request, Response $response)
    {
        if ($this->container->authentication->logOut()) {
            return $response->withRedirect($this->container->router->pathFor('home'));
        } else {
            return $response->withRedirect($this->container->router->pathFor('auth.signin'));
        }
    }
}
