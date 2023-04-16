<?php

namespace Core\UseCase\Auth\CreateUser;

class InputDTO
{
    public string $name;
    public string $email;
    public string $password;

    /**
     * InputDTO constructor.
     * @param string $name
     * @param string $email
     * @param string $password
     */
    public function __construct(string $name, string $email, string $password)
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }
}
