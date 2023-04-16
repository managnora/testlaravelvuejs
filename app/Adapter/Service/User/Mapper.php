<?php


namespace App\Adapter\Service\User;

use App\Models\User as UserModel;
use Core\BusinessModel\User\User;

class Mapper
{
    public function getDataModel(User $user): UserModel
    {
        $userModel = new UserModel();
        $userModel->email = $user->getEmail();
        $userModel->name = $user->getName();
        $userModel->password = $user->getPassword();
        return $userModel;
    }

    public function getBusinessModel(UserModel $userModel): User
    {
        $user = new User(
            $userModel->name,
            $userModel->email,
            $userModel->password
        );
        return $user->setId($userModel->id);
    }

}
