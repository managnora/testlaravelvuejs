<?php

namespace Core\UseCase\Task\UpdateTask;

class InputDTO
{
    public string $name;
    public ?int $parentId;
    public ?bool $isDone;
    public ?array $children;

    /**
     * InputDTO constructor.
     * @param string $name
     * @param int|null $parentId
     * @param bool|null $isDone
     * @param array|null $children
     */
    public function __construct(string $name, ?int $parentId, ?bool $isDone, ?array $children)
    {
        $this->name = $name;
        $this->parentId = $parentId;
        $this->isDone = $isDone;
        $this->children = $children;
    }

}
