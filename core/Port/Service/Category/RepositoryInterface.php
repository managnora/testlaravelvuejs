<?php

namespace Core\Port\Service\Category;

use App\Models\Category;

interface RepositoryInterface
{
    /**
     * @param string $name
     * @param string $description
     * @return Category
     */
    public function store(string $name, string $description): Category;

    /**
     * @param int $departmentId
     * @return Category
     */
    public function get(int $departmentId): Category;
}
