<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Repositories\User\User as UserRepository;
use App\Repositories\User\IUser as UserInterface;
use App\User as UserModel;

class RepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(UserInterface::class, function($app) {
            return new UserRepository(new UserModel());
        });        
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
