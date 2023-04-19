<?php

namespace Core\Port\Service\Comment;

use App\Models\Comment;

interface RepositoryInterface
{
    /**
     * @param string $name
     * @param string $description
     * @return Comment
     */
    public function store(string $name, string $description): Comment;

    /**
     * @param int $departmentId
    Comment     */
    public function get(int $departmentId): Comment;
}
