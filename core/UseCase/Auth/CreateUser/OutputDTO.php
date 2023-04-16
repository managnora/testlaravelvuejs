<?php

namespace Core\UseCase\Auth\CreateUser;

class OutputDTO
{
    public string $token;

    /**
     * OutputDTO constructor.
     * @param string $token
     */
    public function __construct(string $token)
    {
        $this->token = $token;
    }
}
