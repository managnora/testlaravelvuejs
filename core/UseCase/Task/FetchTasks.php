<?php


namespace Core\UseCase\Task;


use Core\Port\Helper\AuthenticatorInterface;
use Core\Port\Service\Task\RepositoryInterface;

class FetchTasks
{
    private RepositoryInterface $repositoryTask;
    private AuthenticatorInterface $authenticator;

    /**
     * FetchAllTask constructor.
     * @param RepositoryInterface $repositoryTask
     * @param AuthenticatorInterface $authenticator
     */
    public function __construct(RepositoryInterface $repositoryTask, AuthenticatorInterface $authenticator)
    {
        $this->repositoryTask = $repositoryTask;
        $this->authenticator = $authenticator;
    }

    /**
     * @return mixed
     */
    public function execute()
    {
        $user = $this->authenticator->getUser();
        return $this->repositoryTask->fetchTask($user);
    }

}
