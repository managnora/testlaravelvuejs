<?php


namespace App\Providers\Adapter\Service;


use App\Adapter\Service\User\Repository;
use Core\Port\Service\User\RepositoryInterface;
use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(RepositoryInterface::class, Repository::class);
    }
}
