<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('edit-users', function($user){
            return ($user->hasRole('admin') or $user->hasRole('author'));
        });


        Gate::define('delete-users', function($user){
            return $user->hasRole('admin');
        });

        //include or exclude menu items. Allowing certain access levels to see certain things. 
        Gate::define('management-users', function($user){
            return ($user->hasRole('admin') or $user->hasRole('author'));
        });


       
    }
}
