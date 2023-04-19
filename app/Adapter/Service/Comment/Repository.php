<?php

namespace App\Adapter\Service\Comment;

use App\Models\Comment;
use Core\Port\Service\Comment\RepositoryInterface;

class Repository extends Comment implements RepositoryInterface
{

    public function store(string $name, string $description): Comment
    {
        // TODO: Implement store() method.
    }

    public function get(int $departmentId): Comment
    {
        // TODO: Implement get() method.
    }
}
