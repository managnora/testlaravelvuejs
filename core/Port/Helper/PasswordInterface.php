<?php

namespace Core\Port\Helper;

use Core\BusinessModel\User\User;

interface PasswordInterface
{

    /**
     * @param string $password
     * @return string
     */
    public function hash(string $password): string;

    /**
     * @param string $password
     * @param User $user
     * @return bool
     */
    public function check(string $password, User $user): bool;
}
