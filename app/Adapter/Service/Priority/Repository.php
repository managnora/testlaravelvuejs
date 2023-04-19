<?php

namespace App\Adapter\Service\Priority;

use App\Models\Priority;
use Core\Port\Service\Priority\RepositoryInterface;

class Repository extends Priority implements RepositoryInterface
{

    public function store(string $name, string $description): Priority
    {
        // TODO: Implement store() method.
    }

    public function get(int $departmentId): Priority
    {
        // TODO: Implement get() method.
    }
}
