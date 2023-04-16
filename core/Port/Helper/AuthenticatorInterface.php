<?php

namespace Core\Port\Helper;

interface AuthenticatorInterface
{
    /**
     * @param string $email
     * @param string $password
     * @return bool
     */
    public function attempt(string $email, string $password): bool;

    /**
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function getUser(): ?\Illuminate\Contracts\Auth\Authenticatable;
}
