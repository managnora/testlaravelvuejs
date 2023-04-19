<?php

namespace Core\UseCase\Department;

use Core\Port\Service\Department\RepositoryInterface;

class StoreDepartment
{

    /**
     * @var RepositoryInterface
     */
    private RepositoryInterface $repository;

    /**
     * @param RepositoryInterface $repository
     */
    public function __construct(RepositoryInterface $repository)
    {
        $this->repository = $repository;
    }


    /**
     * @param string $name
     * @param string $description
     * @return mixed
     */
    public function execute(string $name, string $description): mixed
    {
        return $this->repository->store($name, $description);
    }
}
