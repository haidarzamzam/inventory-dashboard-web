<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'product', 'guard_name' => 'web']);
        Permission::create(['name' => 'read transaction', 'guard_name' => 'web']);
        Permission::create(['name' => 'crud transaction', 'guard_name' => 'web']);
        Permission::create(['name' => 'report', 'guard_name' => 'web']);
        Permission::create(['name' => 'chart', 'guard_name' => 'web']);
    }
}
