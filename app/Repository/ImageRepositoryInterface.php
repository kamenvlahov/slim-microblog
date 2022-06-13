<?php
namespace App\Repository;

interface ImageRepositoryInterface 
{
    public function getImage(int $article_id);
    public function setImage(array $data);
    public function deleteImage(int $id);
}