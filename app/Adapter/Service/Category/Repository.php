<?php

namespace App\Adapter\Service\Category;

use App\Models\Category;
use Core\Port\Service\Category\RepositoryInterface;

class Repository extends Category implements RepositoryInterface
{

    public function store(string $name, string $description): Category
    {
        // TODO: Implement store() method.
    }

    public function get(int $departmentId): Category
    {
        // TODO: Implement get() method.
    }
}
