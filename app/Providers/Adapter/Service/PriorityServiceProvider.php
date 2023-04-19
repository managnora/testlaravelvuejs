<?php

namespace App\Providers\Adapter\Service;

use App\Adapter\Service\Priority\Repository;
use Core\Port\Service\Priority\RepositoryInterface;
use Illuminate\Support\ServiceProvider;

class PriorityServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(RepositoryInterface::class, Repository::class);
    }

}
