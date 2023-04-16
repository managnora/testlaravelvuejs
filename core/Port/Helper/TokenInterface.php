<?php

namespace Core\Port\Helper;

interface TokenInterface
{
    /**
     * @param \Illuminate\Contracts\Auth\Authenticatable|null $user
     * @return string
     */
    public function createToken(?\Illuminate\Contracts\Auth\Authenticatable $user): string;
}
