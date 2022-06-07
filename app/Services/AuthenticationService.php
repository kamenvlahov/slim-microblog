<?php

namespace App\Services;

use App\Model\UserModel;

class AuthenticationService
{
    public function checkForLogin(): bool
    {
        return isset($_SESSION['user']);
    }

    public function getLogedUser()
    {
        $user_id = $this->checkForLogin();
        return $user_id;
    }

    public function setLogin($email, $password): bool
    {
        $user =  UserModel::where('email', $email)->first();

        if (!$user) {
            return false;
        }

        if (password_verify($password, $user->password)) {
            $_SESSION['user'] = $user->id;
            return true;
        }
        return false;
    }
}
