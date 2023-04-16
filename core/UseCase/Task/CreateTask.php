<?php


namespace Core\UseCase\Task;


use App\Models\Task;
use Core\Port\Helper\AuthenticatorInterface;
use Core\Port\Service\Task\RepositoryInterface;
use Core\UseCase\Task\CreateTask\InputDTO;

class CreateTask
{
    private RepositoryInterface $repositoryTask;
    private AuthenticatorInterface $authenticator;

    /**
     * CreateTask constructor.
     * @param RepositoryInterface $repositoryTask
     * @param AuthenticatorInterface $authenticator
     */
    public function __construct(RepositoryInterface $repositoryTask, AuthenticatorInterface $authenticator)
    {
        $this->repositoryTask = $repositoryTask;
        $this->authenticator = $authenticator;
    }


    /**
     * @param InputDTO $inputDTO
     * @return mixed
     */
    public function execute(InputDTO $inputDTO)
    {
        $user = $this->authenticator->getUser();
        return $this->repositoryTask->save($user, [
            'label' => $inputDTO->name,
            'parent_id' => $inputDTO->parentId,
            'is_done' => $inputDTO->isDone,
        ]);
    }
}
