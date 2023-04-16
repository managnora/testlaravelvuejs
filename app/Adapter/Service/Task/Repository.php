<?php

namespace App\Adapter\Service\Task;

use App\Models\Task;
use App\Models\User;
use Core\Port\Service\Task\RepositoryInterface;
use Core\UseCase\Task\UpdateTask\InputDTO;

class Repository implements RepositoryInterface
{
    /**
     * @param User $user
     * @param array $fields
     * @return mixed
     */
    public function save(User $user, array $fields): mixed
    {
        $task = new Task($fields);
        return $user->tasks()->save($task);
    }

    /**
     * @param int $taskId
     * @param InputDTO $inputDTO
     * @return mixed
     */
    public function update(int $taskId, InputDTO $inputDTO): mixed
    {
        return Task::find($taskId)->update([
            'label' => $inputDTO->name,
            'parent_id' => $inputDTO->parentId,
            'is_done' => $inputDTO->isDone?true:false,
        ]);
    }

    /**
     * @param User $user
     * @param int $taskId
     * @return mixed
     */
    public function delete(User $user, int $taskId): mixed
    {
        $task = $user->tasks()->find($taskId);
        return $task->delete();
    }

    /**
     * @param User $user
     * @return mixed
     */
    public function fetchTask(User $user): mixed
    {
        return $user->tasks()
            ->whereNull('parent_id')
            ->with('children')
            ->orderBy('label')->get();
    }

    /**
     * @param array $childTaskId
     * @param bool $isDone
     * @return mixed
     */
    public function updateStateChildren(array $childTaskId, bool $isDone): mixed
    {
        return Task::whereIn('id', $childTaskId)
            ->update([
                'is_done' => $isDone?true:false
            ]);
    }
}
