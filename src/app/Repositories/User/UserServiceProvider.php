<?php

namespace App\Repositories\User;

use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider
{

    /**
     * @return void
     */
    public function boot()
    {
        $this->app->bind('\App\Repositories\User\IUserRepository', '\App\Repositories\User\UserRepository');
    }
}
