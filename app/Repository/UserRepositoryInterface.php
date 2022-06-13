<?php
namespace App\Repository;

interface UserRepositoryInterface 
{
    public function setUser( $request);
    public function getUser(int $userId);
}