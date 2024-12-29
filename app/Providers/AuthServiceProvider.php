<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // Register model policies here
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot()
    {
        $this->registerPolicies();

        // Register Passport routes for API authentication
        if (!app()->routesAreCached()) {
            Passport::routes();
        }

        // Set token expiration time (optional)
        Passport::tokensExpireIn(now()->addDays(15)); // Tokens will expire in 15 days
        Passport::refreshTokensExpireIn(now()->addDays(30)); // Refresh tokens will expire in 30 days

        // Additional Passport scopes (optional)
        Passport::tokensCan([
            'view-users' => 'View user data',
            'manage-users' => 'Manage user accounts',
        ]);

        // Define custom Gates (optional)
        Gate::define('admin-only', function ($user) {
            return $user->is_admin; // Assuming `is_admin` is a boolean field in the `users` table
        });
    }
}
