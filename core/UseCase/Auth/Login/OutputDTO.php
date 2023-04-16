<?php

namespace Core\UseCase\Auth\Login;

class OutputDTO
{
    public bool $success;
    public ?string $token;
    public ?string $message;

    /**
     * OutputDTO constructor.
     * @param bool $success
     * @param string|null $token
     * @param string|null $message
     */
    public function __construct(bool $success, ?string $token, ?string $message)
    {
        $this->success = $success;
        $this->token = $token;
        $this->message = $message;
    }


}
