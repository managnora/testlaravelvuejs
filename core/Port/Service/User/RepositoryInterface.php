<?php

namespace Core\Port\Service\User;

use App\Models\User as UserModel;
use Core\BusinessModel\User\User;
use Core\Exception\BusinessModel\CouldNotSaveException;

interface RepositoryInterface
{
    /**
     * Save Business Model and return a rehydrated one
     *
     * @param User $user
     * @return UserModel
     * @throws CouldNotSaveException
     */
    public function save(User $user): UserModel;
}
