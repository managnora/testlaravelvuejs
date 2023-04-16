<?php

namespace App\Adapter\Helper;

use Core\Port\Helper\AuthenticatorInterface;
use Illuminate\Support\Facades\Auth;

class AuthHelper implements AuthenticatorInterface
{
    /**
     * @param string $email
     * @param string $password
     * @return bool
     */
    public function attempt(string $email, string $password): bool
    {
        return Auth::attempt([
            'email' => $email,
            'password' => $password
        ]);
    }

    /**
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function getUser(): ?\Illuminate\Contracts\Auth\Authenticatable
    {
        return Auth::user();
    }
}
