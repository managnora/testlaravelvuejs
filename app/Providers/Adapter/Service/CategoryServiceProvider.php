<?php

namespace App\Providers\Adapter\Service;

use App\Adapter\Service\Category\Repository;
use Core\Port\Service\Category\RepositoryInterface;
use Illuminate\Support\ServiceProvider;

class CategoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(RepositoryInterface::class, Repository::class);
    }

}
