<?php

namespace Core\Port\Service\Priority;

use App\Models\Priority;

interface RepositoryInterface
{
    /**
     * @param string $name
     * @param string $description
     * @return Priority
     */
    public function store(string $name, string $description): Priority;

    /**
     * @param int $departmentId
    Comment     */
    public function get(int $departmentId): Priority;
}
