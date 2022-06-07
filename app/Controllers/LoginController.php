<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Model\UserModel;
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use Respect\Validation\Validator as v;

class LoginController extends Controller
{
    public function getSignup(Request $request, Response $response)
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
        // $validation = $this->validator->validate($request, [
        //     'email' => v::noWhitespace()->notEmpty()->email(),
        //     'password' => v::noWhitespace()->notEmpty()
        // ]);

        return $this->container->view->render($response, 'signin.twig');
    }

    public function postSignin(Request $request, Response $response)
    {

        $validation = $this->validator->validate($request, [
            'email' => v::noWhitespace()->notEmpty()->email(),
            'password' => v::noWhitespace()->notEmpty()
        ]);
        if ($validation) {
            $auth = $this->container->authentication->setLogin(
                $request->getParams()->email,
                $request->getParams()->password
            );

            if (!$auth) {
                return $response->withRedirect($this->router->pathFor('auth.signin'));
            }
            return $response->withRedirect($this->router->pathFor('home'));
        }

        return $this->container->view->render($response, 'signin.twig');
    }
    public function pushSignout(Request $request, Response $response)
    {
        return $this->container->view->render($response, 'signout.twig');
    }
}
