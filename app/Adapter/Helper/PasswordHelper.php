<?php


namespace App\Adapter\Helper;

use Core\BusinessModel\User\User;
use Core\Port\Helper\PasswordInterface;

class PasswordHelper implements PasswordInterface
{
    /**
     * {@inheritDoc}
     */
    public function hash(string $password): string
    {
        return \Illuminate\Support\Facades\Hash::make($password);
    }

    /**
     * {@inheritDoc}
     */
    public function check(string $password, User $user): bool
    {
        return \Illuminate\Support\Facades\Hash::check($password, $user->getPassword());
    }
}
