<?php

namespace App\Controllers;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use App\Repository\ImageRepositoryInterface;

class ImageController extends Controller 
{
    public function addImage(Request $request, Response $response, array $args):bool
    {
        $uploadedFiles = $request->getUploadedFiles();
        $uploadedFile = $uploadedFiles['image'];
        
        if ($uploadedFile->getError() === UPLOAD_ERR_OK) {
           $file_name = $this->container->fileupload->moveUploadedFile($this->container->upload_directory, $uploadedFile);
           if ($file_name) {
            $this->container->get(ImageRepositoryInterface::class)->setImage([
                'url'=>$file_name,
                'article_id'=>$args['id']
            ]);
           }
        }
        return true;
    }
    public function deleteImage(Request $request, Response $response)
    {
        
    }
}