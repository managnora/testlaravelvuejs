<?php

namespace Core\UseCase\Task;

use Core\Port\Service\Task\RepositoryInterface;
use Core\UseCase\Task\UpdateTask\InputDTO;

class UpdateTask
{
    private RepositoryInterface $repositoryTask;

    /**
     * UpdateTask constructor.
     * @param RepositoryInterface $repositoryTask
     */
    public function __construct(RepositoryInterface $repositoryTask)
    {
        $this->repositoryTask = $repositoryTask;
    }


    /**
     * @param int $taskId
     * @param InputDTO $inputDTO
     * @return mixed
     */
    public function execute(int $taskId, InputDTO $inputDTO)
    {
        $this->repositoryTask->updateStateChildren($inputDTO->children, $inputDTO->isDone);
        return $this->repositoryTask->update($taskId, $inputDTO);
    }
}
