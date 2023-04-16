<?php

namespace Core\Port\Service\Task;

use App\Models\User;
use Core\UseCase\Task\UpdateTask\InputDTO;

interface RepositoryInterface
{

    /**
     * @param User $user
     * @param array $fields
     * @return mixed
     */
    public function save(User $user, array $fields): mixed;

    /**
     * @param int $taskId
     * @param InputDTO $inputDTO
     * @return mixed
     */
    public function update(int $taskId, InputDTO $inputDTO): mixed;

    /**
     * @param User $user
     * @param int $taskId
     * @return mixed
     */
    public function delete(User $user, int $taskId): mixed;

    /**
     * @param User $user
     * @return mixed
     */
    public function fetchTask(User $user): mixed;

    /**
     * @param array $childTaskId
     * @param bool $isDone
     * @return mixed
     */
    public function updateStateChildren(array $childTaskId, bool $isDone): mixed;
}
