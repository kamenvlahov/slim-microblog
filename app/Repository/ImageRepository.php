<?php
namespace App\Repository;

use App\Models\ImageModel;
use Illuminate\Support\Facades\Request;
use App\Repository\ImageRepositoryInterface;

class ImageRepository implements ImageRepositoryInterface
{
    public function getImage(int $article_id)
    {

    }
    public function setImage(array $data)
    {
       return ImageModel::create($data);
    }
    public function deleteImage(int $id)
    {

    }
}