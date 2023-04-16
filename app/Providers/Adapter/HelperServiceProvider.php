<?php

namespace App\Providers\Adapter;

use App\Adapter\Helper\AuthHelper;
use App\Adapter\Helper\PasswordHelper;
use App\Adapter\Helper\TokenHelper;
use Core\Port\Helper\AuthenticatorInterface;
use Core\Port\Helper\PasswordInterface;
use Core\Port\Helper\TokenInterface;
use Illuminate\Support\ServiceProvider;

class HelperServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(TokenInterface::class, TokenHelper::class);
        $this->app->singleton(PasswordInterface::class, PasswordHelper::class);
        $this->app->singleton(AuthenticatorInterface::class, AuthHelper::class);
    }
}
