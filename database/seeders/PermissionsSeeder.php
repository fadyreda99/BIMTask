<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'create transactions']);
        Permission::create(['name' => 'view transactions']);
        Permission::create(['name' => 'record payments']);
        Permission::create(['name' => 'generate reports']);
    }
}
