<?php

namespace Core\Port\Service\Department;

use App\Models\Department;

interface RepositoryInterface
{
    /**
     * @param string $name
     * @param string $description
     * @return Department
     */
    public function store(string $name, string $description): Department;

    /**
     * @param int $departmentId
     * @return Department
     */
    public function get(int $departmentId): Department;

}
