<?php

namespace App\Controllers;

use App\Models\ArticlesModel;
use App\Controllers\Controller;
use Respect\Validation\Validator as v;
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use App\Repository\ArticleRepositoryInterface;

class ArticlesController extends Controller
{
    public function index(Request $request, Response $response)
    {
        $articles = $this->container->get(ArticleRepositoryInterface::class)->listArticles();
        
        return $this->container->view->render($response, '/articles/articles.twig', [
            'list_articles' => $articles
        ]);
    }

    public function getArticles(Request $request, Response $response)
    {
        return $this->container->view->render($response, '/articles/articles.twig');
    }

    public function getArticle(Request $request, Response $response, array $args)
    {
        $article = $this->container->get(ArticleRepositoryInterface::class)->getArticle($args['id']);

        return $this->container->view->render($response, '/articles/article.twig', [
            'article' => $article
        ]);
    }

    public function addArticle(Request $request, Response $response)
    {
        return $this->container->view->render($response, '/articles/add_article.twig');
    }
    public function postArticle(Request $request, Response $response)
    {
        $validation = $this->validator->validate($request, [
            'title' => v::notEmpty(),
        ]);

        if (count($validation['errors'])) {
            foreach ($validation['errors'] as $error) {
                $this->container->flash->addMessage('error', $error);
            }
            return $response->withRedirect($this->container->router->pathFor('articles.add'));
        }
        $article = $this->container->get(ArticleRepositoryInterface::class)->setArticle($request);
        if ($article) {
            $this->container->flash->addMessage('info', "Article created");
            return $response->withRedirect($this->container->router->pathFor('articles'));
        } else {
            $this->container->flash->addMessage('danger', "Something went wrong!");
            return $response->withRedirect($this->container->router->pathFor('articles.add'));
        }
    }
    public function updateArticle(Request $request, Response $response, array $args)
    {
        $article = $this->container->get(ArticleRepositoryInterface::class)->getArticle($args['id']);
        return $this->container->view->render($response, '/articles/update_article.twig', [
            'article' => $article
        ]);
    }
    public function putUpdateArticle(Request $request, Response $response)
    {
    }

    public function deleteArticle(Request $request, Response $response)
    {
    }
}
