<?php

namespace App\Adapter\Helper;

use Core\Port\Helper\TokenInterface;

class TokenHelper implements TokenInterface
{
    const ACCESS_TOKEN = 'accessToken';

    /**
     * {@inheritDoc}
     */
    public function createToken(?\Illuminate\Contracts\Auth\Authenticatable $user): string
    {
        return $user->createToken(self::ACCESS_TOKEN)->accessToken;
    }
}
