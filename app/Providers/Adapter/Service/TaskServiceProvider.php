<?php

namespace App\Providers\Adapter\Service;

use App\Adapter\Service\Task\Repository;
use Core\Port\Service\Task\RepositoryInterface;
use Illuminate\Support\ServiceProvider;

class TaskServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(RepositoryInterface::class, Repository::class);
    }
}
