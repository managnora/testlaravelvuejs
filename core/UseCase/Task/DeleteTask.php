<?php

namespace Core\UseCase\Task;

use Core\Port\Helper\AuthenticatorInterface;
use Core\Port\Service\Task\RepositoryInterface;

class DeleteTask
{
    private RepositoryInterface $repositoryTask;
    private AuthenticatorInterface $authenticator;

    /**
     * DeleteTask constructor.
     * @param RepositoryInterface $repositoryTask
     * @param AuthenticatorInterface $authenticator
     */
    public function __construct(RepositoryInterface $repositoryTask, AuthenticatorInterface $authenticator)
    {
        $this->repositoryTask = $repositoryTask;
        $this->authenticator = $authenticator;
    }

    /**
     * @param int $taskId
     * @return mixed
     */
    public function execute(int $taskId)
    {
        $user = $this->authenticator->getUser();
        return $this->repositoryTask->delete($user, $taskId);
    }
}
