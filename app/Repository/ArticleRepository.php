<?php 

namespace App\Repository;

use App\Models\ArticlesModel;
use \Psr\Http\Message\ServerRequestInterface as Request;

class ArticleRepository extends Repository implements ArticleRepositoryInterface
{
    public function listArticles()
    {
        $articles = ArticlesModel::with(['images','user'])->get();
        
        return $articles;
       
    }
    public function getArticle(int $id)
    {
        $article = ArticlesModel::with(['images','user'])->where('id', $id)->first();
        var_dump($article['images']);
        return $article;
    }
    public function setArticle(Request $request)
    {
      return  ArticlesModel::create(
            [
                'title' => $request->getParam('title'),
                'description' => $request->getParam('description'),
                'body' => $request->getParam('body'),
                'user_id' => $this->container->authentication->getLogedUser()
            ]
        );
    }
    public function updateArticle()
    {}
    public function deleteArticle()
    {}
}