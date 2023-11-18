<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class MakeAdminAndAssignRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminUser = User::create([
                'name' => 'admin',
                'email' => 'admin@admin.com',
                'password' => bcrypt('123456789'), 
            ]);

            $adminRole = Role::where('name', 'admin')->firstOrFail();
            $adminUser->assignRole($adminRole);
    }
}
