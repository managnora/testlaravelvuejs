<?php

namespace App\Providers\Adapter\Service;

use App\Adapter\Service\Comment\Repository;
use Core\Port\Service\Comment\RepositoryInterface;
use Illuminate\Support\ServiceProvider;

class CommentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(RepositoryInterface::class, Repository::class);
    }

}
