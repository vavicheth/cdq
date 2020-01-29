<?php

namespace App\Providers;

use App\Role;
use App\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        $user = \Auth::user();


        // Auth gates for: User management
        Gate::define('user_management_access', function ($user) {
            return in_array($user->role_id, [1]);
        });


        // Auth gates for: Roles
        Gate::define('role_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('role_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('role_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('role_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('role_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Users
        Gate::define('user_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Data basic
        Gate::define('data_basic_access', function ($user) {
            return in_array($user->role_id, [1, 4]);
        });

        // Auth gates for: Title
        Gate::define('title_access', function ($user) {
            return in_array($user->role_id, [1, 4]);
        });
        Gate::define('title_create', function ($user) {
            return in_array($user->role_id, [1, 4]);
        });
        Gate::define('title_edit', function ($user) {
            return in_array($user->role_id, [1, 4]);
        });
        Gate::define('title_view', function ($user) {
            return in_array($user->role_id, [1, 4]);
        });
        Gate::define('title_delete', function ($user) {
            return in_array($user->role_id, [1, 4]);
        });

        // Auth gates for: Departments
        Gate::define('department_access', function ($user) {
            return in_array($user->role_id, [1, 4]);
        });
        Gate::define('department_create', function ($user) {
            return in_array($user->role_id, [1, 4]);
        });
        Gate::define('department_edit', function ($user) {
            return in_array($user->role_id, [1, 4]);
        });
        Gate::define('department_view', function ($user) {
            return in_array($user->role_id, [1, 4]);
        });
        Gate::define('department_delete', function ($user) {
            return in_array($user->role_id, [1, 4]);
        });

        // Auth gates for: Staff
        Gate::define('staff_access', function ($user) {
            return in_array($user->role_id, [1, 4]);
        });
        Gate::define('staff_create', function ($user) {
            return in_array($user->role_id, [1, 4]);
        });
        Gate::define('staff_edit', function ($user) {
            return in_array($user->role_id, [1, 4]);
        });
        Gate::define('staff_view', function ($user) {
            return in_array($user->role_id, [1, 4]);
        });
        Gate::define('staff_delete', function ($user) {
            return in_array($user->role_id, [1, 4]);
        });

        // Auth gates for: User actions
        Gate::define('user_action_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });

        // Auth gates for: Duty
        Gate::define('duty_access', function ($user) {
            return in_array($user->role_id, [1,2, 4]);
        });

        // Auth gates for: Reports
        Gate::define('reports_access', function ($user) {
            return in_array($user->role_id, [1,3]);
        });

        // Auth gates for: Charts
        Gate::define('charts_access', function ($user) {
            return in_array($user->role_id, [1,3]);
        });

    }
}
