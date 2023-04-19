<?php

namespace App\Providers\Adapter\Service;

use App\Adapter\Service\Department\Repository;
use Core\Port\Service\Department\RepositoryInterface;
use Illuminate\Support\ServiceProvider;

class DepartmentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(RepositoryInterface::class, Repository::class);
    }

}
