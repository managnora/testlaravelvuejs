<?php

namespace App\Adapter\Service\Department;

use App\Models\Department;
use Core\Port\Service\Department\RepositoryInterface;

class Repository extends Department implements RepositoryInterface
{

    /**
     * @param string $name
     * @param string $description
     * @return Department
     */
    public function store(string $name, string $description): Department
    {
        return self::create([
            'name' => $name,
            'description' => $description,
        ]);
    }

    /**
     * @param int $departmentId
     * @return Department
     */
    public function get(int $departmentId): Department
    {
        return self::find($departmentId);
    }
}
