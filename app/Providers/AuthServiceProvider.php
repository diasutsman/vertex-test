<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

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
        // $roleAdmin = Role::create(['name' => 'admin']);
        // $roleAdmin->givePermissionTo(
        //     Permission::create(['name' => 'approve loan']),
        //     Permission::create(['name' => 'see all loan']),
        // );

        // $roleCustomer = Role::create(['name' => 'customer']);

        // $roleCustomer->givePermissionTo(
        //     Permission::create(['name' => 'apply loan']),
        //     Permission::create(['name' => 'see their loan']),
        // );
    }
}
