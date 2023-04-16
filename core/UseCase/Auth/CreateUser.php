<?php


namespace Core\UseCase\Auth;


use Core\BusinessModel\User\User;
use Core\Port\Helper\PasswordInterface;
use Core\Port\Helper\TokenInterface;
use Core\Port\Service\User\RepositoryInterface;
use Core\UseCase\Auth\CreateUser\InputDTO;
use Core\UseCase\Auth\CreateUser\OutputDTO;

class CreateUser
{
    private RepositoryInterface $repository;
    private TokenInterface $tokenInterface;
    private PasswordInterface $passwordInterface;

    /**
     * CreateUser constructor.
     * @param RepositoryInterface $repository
     * @param TokenInterface $tokenInterface
     * @param PasswordInterface $passwordInterface
     */
    public function __construct(RepositoryInterface $repository, TokenInterface $tokenInterface, PasswordInterface $passwordInterface)
    {
        $this->repository = $repository;
        $this->tokenInterface = $tokenInterface;
        $this->passwordInterface = $passwordInterface;
    }

    /**
     * @param InputDTO $inputDTO
     * @return OutputDTO
     * @throws \Core\Exception\BusinessModel\CouldNotSaveException
     */
    public function execute(InputDTO $inputDTO): OutputDTO
    {
        $user = new User(
            $inputDTO->name,
            $inputDTO->email,
            $this->passwordInterface->hash($inputDTO->password),
        );
        $userSaved = $this->repository->save($user);
        return new OutputDTO($this->tokenInterface->createToken($userSaved));
    }
}
