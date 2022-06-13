<?php

namespace App\Services;

use App\Models\UserModel;

class AuthenticationService
{
    public function checkForLogin(): bool
    {
        return isset($_SESSION['user']);
    }

    public function getLogedUser(): int
    {
        return $this->checkForLogin();
    }

    public function logOut(): bool
    {
        unset($_SESSION['user']);
        return true;
    }
    public function setLogin($email, $password): bool
    {
        $user = UserModel::where('username', $email)->first();
        if (!$user->id) {
            return false;
        }
        if (password_verify($password, $user->password)) {
            $_SESSION['user'] = $user->id;
            return true;
        }
        return false;
    }
}
