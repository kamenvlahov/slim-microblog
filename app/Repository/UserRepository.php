<?php

namespace App\Repository;

use App\Models\UserModel;

class UserRepository extends Repository implements UserRepositoryInterface
{
    public function setUser($request)
    {
        $data = $request->getParams();
        $user = UserModel::create([
            'username' => $data['email'],
            'password' => password_hash($data['password'], PASSWORD_DEFAULT, ['cost' => 10]),
            'rights' => 1
        ]);
        return $user;
    }
    public function getUser(int $userId)
    {
    }
}
