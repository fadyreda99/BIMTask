<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $this->call(PermissionsSeeder::class);

        // $adminRole = Role::create(['name' => 'admin']);
        // $customerRole = Role::create(['name' => 'customer']);

        // $createTransactionsPermission = Permission::where('name', 'create transactions')->first();
        // $viewTransactionsPermission = Permission::where('name', 'view transactions')->first();
        // $recordPaymentPermission = Permission::where('name', 'record payments')->first();
        // $generateReportsPermission = Permission::where('name', 'generate reports')->first();

        // $adminRole->givePermissionTo($createTransactionsPermission, $viewTransactionsPermission, $recordPaymentPermission, $generateReportsPermission);
        // $customerRole->givePermissionTo($viewTransactionsPermission);

        // $adminUser = User::create([
        //     'name' => 'Admin',
        //     'email' => 'admin@admin.com',
        //     'password' => bcrypt('123456789'), 
        //     // 'team_id' => 1,
        // ]);

        // $adminUser->assignRole($adminRole);

        // $regularUser = User::create([
        //     'name' => 'User',
        //     'email' => 'user@user.com',
        //     'password' => bcrypt('123456789'),
        //     // 'team_id' => 1,
        // ]);
        // $regularUser->assignRole($customerRole);


    }
}
