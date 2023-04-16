<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\StoreTaskRequest;
use Core\UseCase\Task\CreateTask;
use Core\UseCase\Task\DeleteTask;
use Core\UseCase\Task\FetchTasks;
use Core\UseCase\Task\UpdateTask;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TaskController extends BaseController
{
    /**
     * @param FetchTasks $fetchTasks
     * @return JsonResponse
     */
    public function index(FetchTasks $fetchTasks): JsonResponse
    {
        try {
            $output = $fetchTasks->execute();

            return $this->sendResponse(['tasks' => $output]);
        } catch (\Exception $exception) {
            return $this->sendError('Internal_server_error.', ['error' => $exception->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function show($id)
    {

    }

    /**
     * @param StoreTaskRequest $request
     * @param CreateTask $createTask
     * @return JsonResponse
     */
    public function store(StoreTaskRequest $request, CreateTask $createTask): JsonResponse
    {
        try {
            $input = new CreateTask\InputDTO(
                $request->name,
                $request->parent_id,
                $request->is_done,
            );
            $output = $createTask->execute($input);

            return $this->sendResponse(['task' => $output]);
        } catch (\Exception $exception) {
            return $this->sendError('Internal_server_error.', ['error' => $exception->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * @param $id
     * @param Request $request
     * @param UpdateTask $updateTask
     * @return JsonResponse
     */
    public function update($id, Request $request, UpdateTask $updateTask): JsonResponse
    {
        try {
            $input = new UpdateTask\InputDTO(
                $request->task['label'],
                $request->task['parent_id'],
                $request->task['is_done'],
                $request->childrenSelectedTask
            );
            $output = $updateTask->execute($id, $input);

            return $this->sendResponse(['task' => $output]);
        } catch (\Exception $exception) {
            return $this->sendError('Internal_server_error.', ['error' => $exception->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * @param $id
     * @param DeleteTask $deleteTask
     * @return JsonResponse
     */
    public function destroy($id, DeleteTask $deleteTask)
    {
        try {
            $output = $deleteTask->execute($id);

            return $this->sendResponse(['deleted' => $output]);
        } catch (\Exception $exception) {
            return $this->sendError('Internal_server_error.', ['error' => $exception->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
