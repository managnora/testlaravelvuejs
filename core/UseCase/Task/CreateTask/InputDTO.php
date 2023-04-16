<?php

namespace Core\UseCase\Task\CreateTask;

class InputDTO
{
    public string $name;
    public ?int $parentId;
    public ?bool $isDone;

    /**
     * InputDTO constructor.
     * @param string $name
     * @param int|null $parentId
     * @param bool|null $isDone
     */
    public function __construct(string $name, ?int $parentId, ?bool $isDone)
    {
        $this->name = $name;
        $this->parentId = $parentId;
        $this->isDone = $isDone;
    }

}
