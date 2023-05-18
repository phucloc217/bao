<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\Baiviet;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('update-post', function ($user,Baiviet $baiviet)
        {
            return ($user->id==$baiviet->id&&$user->hasAccess('update post'))||$user->hasRole('admin');
        });
    }
}
