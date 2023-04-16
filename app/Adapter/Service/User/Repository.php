<?php


namespace App\Adapter\Service\User;


use App\Models\User as UserModel;
use Core\BusinessModel\User\User;
use Core\Exception\BusinessModel\CouldNotSaveException;
use Core\Port\Service\User\RepositoryInterface;

class Repository implements RepositoryInterface
{
    /**
     * {@inheritDoc}
     */
    public function save(User $user): UserModel
    {
        try {
            return UserModel::create([
                'email' => $user->getEmail(),
                'name' => $user->getName(),
                'password' => $user->getPassword()
            ]);
        } catch (\Exception $e) {
            throw new CouldNotSaveException($e->getMessage(), $e->getCode(), $e);
        }
    }

}
