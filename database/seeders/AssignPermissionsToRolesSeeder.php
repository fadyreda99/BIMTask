<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AssignPermissionsToRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $createTransactionsPermission = Permission::where('name', 'create transactions')->first();
        $viewTransactionsPermission = Permission::where('name', 'view transactions')->first();
        $recordPaymentPermission = Permission::where('name', 'record payments')->first();
        $generateReportsPermission = Permission::where('name', 'generate reports')->first();

        // Use firstOrFail or first to get the role instance
        $adminRole = Role::where('name', 'admin')->firstOrFail();
        $customerRole = Role::where('name', 'customer')->firstOrFail();

        $adminRole->givePermissionTo($createTransactionsPermission, $viewTransactionsPermission, $recordPaymentPermission, $generateReportsPermission);
        $customerRole->givePermissionTo($viewTransactionsPermission);

    }
}
