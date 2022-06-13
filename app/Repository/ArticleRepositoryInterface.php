<?php
namespace App\Repository;

use \Psr\Http\Message\ServerRequestInterface as Request;

interface ArticleRepositoryInterface 
{
    public function listArticles();
    public function getArticle(int $id);
    public function setArticle(Request $request);
    public function updateArticle();
    public function deleteArticle();
}