<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissionApproveLoans = Permission::create(['name' => 'approve-loans']);
        $permissionViewAllLoans = Permission::create(['name' => 'view-all-loans']);
        $permissionApplyLoans = Permission::create(['name' => 'apply-loans']);
        $permissionViewOwnedLoans = Permission::create(['name' => 'view-owned-loans']);

        $roleAdmin = Role::create(['name' => 'admin']);
        $roleAdmin->syncPermissions(
            $permissionApproveLoans,
            $permissionViewAllLoans,
        );

        $roleCustomer = Role::create(['name' => 'customer']);

        $roleCustomer->syncPermissions(
            $permissionApplyLoans,
            $permissionViewOwnedLoans,
        );
    }
}
